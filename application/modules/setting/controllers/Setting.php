<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->breadcrumbs->push('Website Configuration', '/');
        $this->load->model('setting_model', 'settings');
    }

    public function index()
    {
        if($_POST)
        {
            $this->settings->update_option($_POST);
            $this->session->set_flashdata('message', 'Settings have been updated');
            redirect(current_url());
        }
        else
        {
            $data['settings'] = $this->load->view('general', '', TRUE);
            $data['content'] = $this->load->view('settings', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function contact()
    {
        if($_POST)
        {
            $this->settings->update_option($_POST);
            $this->session->set_flashdata('message', 'Settings have been updated');
            redirect(current_url());
        }
        else
        {
            $data['contact'] = $this->settings->get_address();
            $data['settings'] = $this->load->view('contact', $data, TRUE);
            $data['content'] = $this->load->view('settings', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function sosmed()
    {
        if($_POST)
        {
            $this->settings->update_option($_POST);
            $this->session->set_flashdata('message', 'Settings have been updated');
            redirect(current_url());
        }
        else
        {
            $data['settings'] = $this->load->view('sosmed', '', TRUE);
            $data['content'] = $this->load->view('settings', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function seo()
    {
        if($_POST)
        {
            $this->settings->update_option($_POST);
            $this->session->set_flashdata('message', 'Settings have been updated');
            redirect(current_url());
        }
        else
        {
            $data['settings'] = $this->load->view('seo', '', TRUE);
            $data['content'] = $this->load->view('settings', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function email()
    {
        if($_POST)
        {
            $this->settings->update_option($_POST);
            $this->session->set_flashdata('message', 'Settings have been updated');
            redirect(current_url());
        }
        else
        {
            $data['settings'] = $this->load->view('email', '', TRUE);
            $data['content'] = $this->load->view('settings', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

}
