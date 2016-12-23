<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends MX_Controller {

	public function __construct()
	{
		parent:: __construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
		$this->load->model('career_model', 'career');
	}

	public function index()
	{
		$this->breadcrumbs->push('All Vacancies', '/');
        $data['content'] = $this->load->view('careers', '', TRUE);
        $this->load->view_admin('template', $data);
	}

	private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('career/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('career/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->career->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $career)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $career->career_title;
            $row[] = format_dmy($career->date_open);
            $row[] = format_dmy($career->date_close);
            $row[] = ($career->is_open == 1) ? '<label class="label label-info">Open</label>' : '<label class="label label-danger">Close</label>';
            $row[] = $this->_get_button($career->career_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->career->count_all(),
			'recordsFiltered' => $this->career->count_filtered(),
			'data' => $data,
		);
		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

	public function submit($id=null)
	{

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->breadcrumbs->push('All Vacancies', '/careers');

		if(empty($id))
		{
			$this->breadcrumbs->push('Add Vacancy', '/');
			$career = array(
				'career_id' 			=> '',
				'career_title'			=> '',
				'career_slug'			=> '',
				'career_qualifications'	=> '',
				'career_skills'			=> '',
				'date_open'				=> date('Y-m-d'),
				'date_close'			=> date('Y-m-d'),
				'is_open'				=> 1,
			);
		}
		else
		{
			$this->breadcrumbs->push('Edit Vacancy', '/');
			$career = (array) $this->career->get_detail_career($id);
		}

		$this->form_validation->set_rules('career_title', 'career title', 'required');
		$this->form_validation->set_rules('career_date', 'career date', 'required');
		$this->form_validation->set_rules('career_qualifications[]', 'career qualification', 'required');
		$this->form_validation->set_rules('career_skills[]', 'career skills', 'required');

		if($this->form_validation->run() == TRUE)
		{
			$career_date = explode('to', $this->input->post('career_date'));
			$save = array(
				'career_id'				=> $id,
				'career_title'			=> $this->input->post('career_title'),
				'career_slug'			=> $this->input->post('career_slug'),
				'date_open'				=> format_ymd($career_date[0]),
				'date_close'			=> format_ymd($career_date[1]),
				'career_qualifications' => implode('|', $this->input->post('career_qualifications')),
				'career_skills'			=> implode('|', $this->input->post('career_skills')),
				'is_open'				=> (bool) $this->input->post('is_open'),
			);
			$this->career->submit_form_data($save);
			redirect('careers');
		}
		else
		{
			$data['content'] = $this->load->view('form-career', $career, TRUE);
			$this->load->view_admin('template', $data);
		}
	}

	public function delete($id)
    {
        $this->career->delete_career($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('careers');
    }

}
