<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('sales_model', 'sales');
    }

    public function index()
    {
        $this->breadcrumbs->push('All Sales', '/');
        $data['sales'] = $this->sales->get_all_sales();
        $data['content'] = $this->load->view('sales', $data, TRUE);
        $this->load->view_admin('template', $data);
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Sales', '/sales');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Sales', '/');
            $data = array(
                'sales_id' => '',
                'sales_name' => '',
                'sales_phone' => '',
                'sales_email' => '',
                'sales_website' => '',
                'sales_address' => '',
                'sales_img' => 'no_image.jpg',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Sales', '/');
            $data = (array) $this->sales->get_detail_sales($id);
        }

        $this->form_validation->set_rules('sales_name', 'name', 'required');
        $this->form_validation->set_rules('sales_phone', 'post title', 'numeric');
        $this->form_validation->set_rules('sales_email', 'post title', 'valid_email');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'sales_id' => $id,
                'sales_name' => $this->input->post('sales_name'),
                'sales_phone' => $this->input->post('sales_phone'),
                'sales_email' => $this->input->post('sales_email'),
                'sales_website' => $this->input->post('sales_website'),
                'sales_address' => $this->input->post('sales_address'),
                'sales_img' => basename($this->input->post('sales_img')),
            );
            $this->sales->submit_form_data($save);
            redirect('sales');
        }
        else
        {
            $data['content'] = $this->load->view('form-sales', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->sales->delete_sales($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('sales');
    }

}
