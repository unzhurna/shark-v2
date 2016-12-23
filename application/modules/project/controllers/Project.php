<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('project_model', 'project');
    }

    public function index()
    {
        $this->breadcrumbs->push('Our Project', '/');
        $data['content'] = $this->load->view('projects', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('project/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('project/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->project->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $project)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/project/'.$project->project_img).'" alt="'.$project->project_name.'">';
            $row[] = $project->project_name;
            $row[] = $this->_get_button($project->project_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->project->count_all(),
			'recordsFiltered' => $this->project->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Projects', '/projects');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Project', '/');
            $data = array(
                'project_id' => '',
                'project_name' => '',
                'project_img' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Project', '/');
            $data = (array) $this->project->get_detail_project($id);
        }

        $this->form_validation->set_rules('project_name', 'company name', 'required');
        $this->form_validation->set_rules('project_img', 'Image', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'project_id' => $id,
                'project_name' => $this->input->post('project_name'),
                'project_img' => basename($this->input->post('project_img')),
            );
            $this->project->submit_form_data($save);
            redirect('projects');
        }
        else
        {
            $data['content'] = $this->load->view('form-project', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->project->delete_project($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('projects');
    }

}
