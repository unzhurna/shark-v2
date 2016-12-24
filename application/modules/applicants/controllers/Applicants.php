<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicants extends MX_Controller {

	public function __construct()
	{
		parent:: __construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		$this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
		$this->load->model('applicant_model', 'applicant');
	}

	public function index()
	{
		$this->breadcrumbs->push('All Applicants', '/');
        $data['content'] = $this->load->view('applicants', '', TRUE);
        $this->load->view_admin('template', $data);
	}

	private function _get_button($cv)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="View CV" target="_blank" href="'.base_url('uploads/cv/'.$cv).'"><i class="fa fa-file"></i></a>';
        //$button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('career/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->applicant->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $app)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $app->career_title;
            $row[] = $app->applicant_name;
            $row[] = $app->applicant_email;
            $row[] = $app->applicant_phone;
            $row[] = format_dmy($app->apply_date);
            $row[] = $this->_get_button($app->applicant_cv);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->applicant->count_all(),
			'recordsFiltered' => $this->applicant->count_filtered(),
			'data' => $data,
		);
		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

}
