<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('client_model', 'client');
    }

    public function index()
    {
        $this->breadcrumbs->push('Our Clients', '/');
        $data['content'] = $this->load->view('clients', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('client/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('client/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->client->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $client)
        {
            $no++;
            $row = array();
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/client/'.$client->client_logo).'" alt="'.$client->client_name.'">';
            $row[] = $client->client_name;
            $row[] = $client->client_phone;
            $row[] = $client->client_email;
            $row[] = $this->_get_button($client->client_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->client->count_all(),
			'recordsFiltered' => $this->client->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Clients', '/clients');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Client', '/');
            $data = array(
                'client_id' => '',
                'client_name' => '',
                'client_logo' => '',
                'client_phone' => '',
                'client_email' => '',
                'client_addr' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Client', '/');
            $data = (array) $this->client->get_detail_client($id);
        }

        $this->form_validation->set_rules('client_name', 'name', 'required');
        $this->form_validation->set_rules('client_logo', 'logo', 'required');
        $this->form_validation->set_rules('client_phone', 'phone', 'numeric');
        $this->form_validation->set_rules('client_email', 'email', 'valid_email');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'client_id' => $id,
                'client_name' => $this->input->post('client_name'),
                'client_logo' => basename($this->input->post('client_logo')),
                'client_phone' => $this->input->post('client_phone'),
                'client_email' => $this->input->post('client_email'),
                'client_addr' => $this->input->post('client_addr'),
            );
            $this->client->submit_form_data($save);
            redirect('clients');
        }
        else
        {
            $data['content'] = $this->load->view('form-client', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->client->delete_client($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('clients');
    }

}
