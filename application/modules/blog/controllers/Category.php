<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('category_model', 'category');
    }

    public function index()
    {
        $this->breadcrumbs->push('All Categories', '/');
        $data['content'] = $this->load->view('categories', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('category/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('category/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->category->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $category)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $category->category_name;
            $row[] = $category->category_desc;
            $row[] = ($category->is_show == 1) ? '<label class="label label-info">Yes</label>' : '<label class="label label-danger">No</label>';
            $row[] = $this->_get_button($category->category_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->category->count_all(),
			'recordsFiltered' => $this->category->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Categories', '/categories');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Category', '/');
            $data = array(
                'category_id' => '',
                'category_name' => '',
                'category_slug' => '',
                'category_desc' => '',
                'is_show' => 1,
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Category', '/');
            $data = (array) $this->category->get_detail_category($id);
        }

        $this->form_validation->set_rules('category_name', 'post title', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'category_id' => $id,
                'category_name' => $this->input->post('category_name'),
                'category_slug' => $this->input->post('category_slug'),
                'category_desc' => $this->input->post('category_desc'),
                'category_term' => 'article',
                'is_show' => (bool) $this->input->post('is_show'),
            );
            $this->category->submit_form_data($save);
            redirect('categories');
        }
        else
        {
            $data['content'] = $this->load->view('form-category', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->category->delete_category($id);
        $this->session->set_flashdata('message', 'Success, Category has been deleted!');
        redirect('categories');
    }

}
