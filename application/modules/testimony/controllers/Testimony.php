<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimony extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('testi_model', 'testimony');
    }

    public function index()
    {
        $this->breadcrumbs->push('Testimonial', '/');
        $data['content'] = $this->load->view('testimony', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('testimony/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('testimony/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->testimony->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $testi)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $testi->testi_name;
            $row[] = $testi->testi_title;
            $row[] = $testi->testi_content;
            $row[] = $this->_get_button($testi->testi_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->testimony->count_all(),
			'recordsFiltered' => $this->testimony->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->breadcrumbs->push('Testimonial', '/testimony');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Testimony', '/');
            $data = array(
                'testi_id' => '',
                'testi_name' => '',
                'testi_content' => '',
                'testi_title' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Testimony', '/');
            $data = (array) $this->testimony->get_detail_testi($id);
        }

        $this->form_validation->set_rules('testi_name', 'name', 'required');
        $this->form_validation->set_rules('testi_content', 'message', 'required');
        $this->form_validation->set_rules('testi_title', 'title', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'testi_id' => $id,
                'testi_name' => $this->input->post('testi_name'),
                'testi_content' => $this->input->post('testi_content'),
                'testi_title' => $this->input->post('testi_title'),
            );
            $this->testimony->submit_form_data($save);
            redirect('testimony');
        }
        else
        {
            $data['content'] = $this->load->view('form-testimony', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->testimony->delete_testi($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('testimony');
    }

}
