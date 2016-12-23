<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('banner_model', 'banner');
    }

    public function index()
    {
        $this->breadcrumbs->push('Home Banner', '/');
        $data['content'] = $this->load->view('banners', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('banner/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->banner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $banner)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/banner/'.$banner->banner).'">';
            $row[] = $banner->status;
            $row[] = $this->_get_button($banner->id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->banner->count_all(),
			'recordsFiltered' => $this->banner->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Banners', '/banners');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Banner', '/');
            $data = array(
                'banner'    => '',
                'caption'   => '',
                'link'      => '',
                'link_text' => '',
                'status'    => 1,
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Banner', '/');
            $data = (array) $this->banner->get_detail_banner($id);
        }

        $this->form_validation->set_rules('banner', 'image', 'required');
        $this->form_validation->set_rules('caption', 'caption', 'required');
        $this->form_validation->set_rules('link', 'link', 'required');
        $this->form_validation->set_rules('link_text', 'link text', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'id'        => $id,
                'banner'    => basename($this->input->post('banner')),
                'caption'   => $this->input->post('caption'),
                'link'      => $this->input->post('link'),
                'link_text' => $this->input->post('link_text'),
                'status'    => (bool) $this->input->post('status'),
            );
            $this->banner->submit_form_data($save);
            redirect('banners');
        }
        else
        {
            $data['content'] = $this->load->view('form-banner', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->project->delete_project($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('banners');
    }

}
