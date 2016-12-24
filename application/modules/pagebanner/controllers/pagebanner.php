<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pagebanner extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('pagebanner_model', 'pagebanner');
    }

    public function index()
    {
        $this->breadcrumbs->push('Page Banner', '/');
        $data['content'] = $this->load->view('pagebanners', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('pagebanner/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('pagebanner/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->pagebanner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pagebanner)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/pagebanner/'.$pagebanner->banner_img).'" alt="'.$pagebanner->banner_name.'">';
            $row[] = $pagebanner->banner_name;
            $row[] = $this->_get_button($pagebanner->banner_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->pagebanner->count_all(),
			'recordsFiltered' => $this->pagebanner->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Page Banners', '/pagebanners');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add page banner', '/');
            $data = array(
                'banner_id' => '',
                'banner_name' => '',
                'banner_img' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Page Banner', '/');
            $data = (array) $this->pagebanner->get_detail_pagebanner($id);
        }

        $this->form_validation->set_rules('banner_name', 'banner name', 'required');
        $this->form_validation->set_rules('banner_img', 'Image', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'banner_id' => $id,
                'banner_name' => $this->input->post('banner_name'),
                'banner_img' => basename($this->input->post('banner_img')),
            );
            $this->pagebanner->submit_form_data($save);
            redirect('pagebanners');
        }
        else
        {
            $data['content'] = $this->load->view('form-pagebanner', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->pagebanner->delete_pagebanner($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('pagebanners');
    }

}
