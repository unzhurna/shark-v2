<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sparepart extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('sparepart_model', 'sparepart');
    }

    public function index()
    {
        $this->breadcrumbs->push('All Spareparts', '/');
        $data['content'] = $this->load->view('spareparts', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('sparepart/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('sparepart/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->sparepart->get_datatables();
        $data = array();
        foreach ($list as $sparepart)
        {
            $row = array();
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/sparepart/'.$sparepart->part_img).'" alt="'.$sparepart->part_name.'">';
            $row[] = $sparepart->part_name;
            $row[] = $sparepart->part_code;
            $row[] = $this->_get_button($sparepart->part_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->sparepart->count_all(),
			'recordsFiltered' => $this->sparepart->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    function get_list($id=false)
	{
		if($id)
		{
			$data = (array) $this->sparepart->get_detail_part($id);
			$result = array_merge(array('alert'=>'success'), $data);
		}
		$this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($result));
	}

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Spareparts', '/spareparts');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Sparepart', '/');
            $data = array(
                'part_id' => '',
                'part_name' => '',
                'part_code' => '',
                'part_desc' => '',
                'part_img' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Sparepart', '/');
            $data = (array) $this->sparepart->get_detail_part($id);
        }

        $this->form_validation->set_rules('part_name', 'part name', 'required');
        $this->form_validation->set_rules('part_code', 'part code', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'part_id' => $id,
                'part_name' => $this->input->post('part_name'),
                'part_code' => $this->input->post('part_code'),
                'part_desc' => $this->input->post('part_desc'),
                'part_img' => basename($this->input->post('part_img')),
            );
            $this->sparepart->submit_form_data($save);
            redirect('spareparts');
        }
        else
        {
            $data['content'] = $this->load->view('form-sparepart', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->sparepart->delete_part($id);
        $this->session->set_flashdata('message', 'Success, Data category has been deleted!');
        redirect('spareparts');
    }

}
