<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
		{
            redirect('login');
		}
        else
        {
            redirect('dashboard');
        }
    }

    public function login()
	{
        $this->load->library('form_validation');
		$this->form_validation->set_rules('identity', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('dashboard', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh');
			}
		}
		else
		{
            $data['content'] = $this->load->view('form-login', '', TRUE);
            $this->load->view_admin('auth', $data);
		}
	}

    public function logout()
	{
		$this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('login');
	}

}
