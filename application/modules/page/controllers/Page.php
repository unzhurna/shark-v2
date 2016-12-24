<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('page_model', 'page');
    }

    public function index()
    {
        $this->breadcrumbs->push('All Pages', '/');
        $data['content'] = $this->load->view('pages', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('page/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('page/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->page->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $page)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $page->page_title;
            $row[] = $page->page_author;
            $row[] = format_dmy($page->page_update);
            $row[] = ($page->page_status != 1) ? '<label class="label label-danger">draft</label>' : '<label class="label label-info">publish</label>';
            $row[] = $this->_get_button($page->page_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->page->count_all(),
			'recordsFiltered' => $this->page->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Pages', '/pages');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add page', '/');
            $data = array(
                'page_id' => '',
                'page_title' => '',
                'page_slug' => '',
                'page_content' => '',
                'page_status' => '1',
                'page_image' => '',

            );
        }
        else
        {
            $this->breadcrumbs->push('Edit page', '/');
            $data = (array) $this->page->get_detail_page($id);
        }

        $this->form_validation->set_rules('page_title', 'page title', 'required');
        $this->form_validation->set_rules('page_content', 'page content', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'page_id' => $id,
                'page_author' => login_data('id'),
                'page_title' => $this->input->post('page_title'),
                'page_image' => $this->input->post('page_image'),
                'page_slug' => $this->input->post('page_slug'),
                'page_content' => $this->input->post('page_content'),
                'page_status' => (bool) $this->input->post('page_status')
            );
            $this->page->submit_form_data($save);
            redirect('pages');
        }
        else
        {
            $data['content'] = $this->load->view('form-page', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->page->delete_page($id);
        $this->session->set_flashdata('message', 'Success, Data has been deleted!');
        redirect('pages');
    }
}
