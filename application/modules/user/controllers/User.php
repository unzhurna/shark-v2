<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
    }

    public function index()
    {
        $data['users'] = $this->ion_auth->users()->result();
		foreach ($data['users'] as $k => $user)
		{
			$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
        $this->breadcrumbs->push('All Users', '/');
        $data['content'] = $this->load->view('users', $data, TRUE);
        $this->load->view_admin('template', $data);
    }

    public function add_user()
    {
        $this->breadcrumbs->push('All Users', '/users');
        $this->breadcrumbs->push('Add User', '/');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');

        $data = array(
            'id' => '',
            'avatar' => '',
            'first_name' => '',
            'last_name' => '',
            'phone' => '',
            'email' => '',
            'website' => '',
            'address' => '',
        );

        $this->form_validation->set_rules('first_name', 'first name', 'required');
        $this->form_validation->set_rules('last_name', 'last name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', 'phone', 'trim|numeric');
        $this->form_validation->set_rules('website', 'website', 'trim');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');

        if($this->form_validation->run() === TRUE)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = $email;
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone'),
                'website'    => $this->input->post('website'),
                'address'    => $this->input->post('address'),
                'avatar'    => basename($this->input->post('avatar')),
            );

            if ($this->ion_auth->register($identity, $password, $email, $additional_data))
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('users');
            }
        }
        else
        {
            $data['content'] = $this->load->view('form-user', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function edit_user($id)
	{
        $this->breadcrumbs->push('All Users', '/users');
        $this->breadcrumbs->push('Edit User', '/');

        $this->load->helper('form');
        $this->load->library('form_validation');

		$user = $this->ion_auth->user($id)->row();

        $data = array(
            'id' => $id,
            'avatar' => $user->avatar,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'email' => $user->email,
            'website' => $user->website,
            'address' => $user->address,
            'active' => $user->active,
            'groups' => $this->ion_auth->groups()->result_array(),
            'currentGroups' => $this->ion_auth->get_users_groups($id)->result(),
        );

        $this->form_validation->set_rules('first_name', 'first name', 'required');
        $this->form_validation->set_rules('last_name', 'last name', 'required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|numeric');
        $this->form_validation->set_rules('website', 'website', 'trim');

        if ($this->input->post('password'))
        {
            $this->form_validation->set_rules('password', 'password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'password confirm', 'required');
        }

        if ($this->form_validation->run() === TRUE)
        {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone'),
                'website'    => $this->input->post('website'),
                'address'    => $this->input->post('address'),
                'avatar'    => basename($this->input->post('avatar')),
                'active'    => (bool) $this->input->post('active'),
            );

            if ($this->input->post('password'))
            {
                $data['password'] = $this->input->post('password');
            }

            if ($this->input->post('group'))
            {
                $this->ion_auth->remove_from_group('', $id);
                $this->ion_auth->add_to_group($this->input->post('group'), $id);
            }

            if($this->ion_auth->update($id, $data))
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('users');
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('users');
            }

        }

        $data['content'] = $this->load->view('form-user', $data, TRUE);
        $this->load->view_admin('template', $data);
    }
}
