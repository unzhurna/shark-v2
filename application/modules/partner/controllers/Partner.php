<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }

        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('partner_model', 'partner');

    }

    public function index()
    {
        $this->breadcrumbs->push('Our Partners', '/');
        $data['content'] = $this->load->view('partners', '', TRUE);
        $this->load->view_admin('template', $data);

    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('partner/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('partner/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->partner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $partner)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $partner->partner_name;
            $row[] = $partner->partner_phone;
            $row[] = $partner->partner_email;
            $row[] = $this->_get_button($partner->partner_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->partner->count_all(),
			'recordsFiltered' => $this->partner->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Partners', '/partners');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Partner', '/');
            $data = array(
                'partner_id' => '',
                'partner_name' => '',
                'partner_phone' => '',
                'partner_email' => '',
                'partner_addr' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Partner', '/');
            $data = (array) $this->partner->get_detail_partner($id);
            $data['cities'] = $this->partner->get_all_cities($data['province_id']);
        }

        $this->form_validation->set_rules('partner_name', 'name', 'required');
        $this->form_validation->set_rules('partner_phone', 'phone', 'required|numeric');
        $this->form_validation->set_rules('partner_email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('partner_addr', 'address', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'partner_id' => $id,
                'partner_name' => $this->input->post('partner_name'),
                'partner_phone' => $this->input->post('partner_phone'),
                'partner_email' => $this->input->post('partner_email'),
                'province_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'partner_addr' => $this->input->post('partner_addr'),
            );
            $this->partner->submit_form_data($save);
            redirect('partners');
        }
        else
        {
            $data['provinces'] = $this->partner->get_all_province();
            $data['content'] = $this->load->view('form-partner', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function get_all_cities($province_id)
    {
        // if(!$this->input->is_ajax_request())
		// {
		// 	show_404();
		// 	exit;
		// }
        $cities = $this->partner->get_all_cities($province_id);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($cities));
    }

    public function delete($id)
    {
        $this->partner->delete_partner($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('partners');
    }

}
