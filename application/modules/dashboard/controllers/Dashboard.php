<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct()
	{
		parent:: __construct();
		if(!$this->ion_auth->logged_in())
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data['content'] = $this->load->view('dashboard', '', TRUE);
		$this->load->view_admin('template', $data);
	}

}
