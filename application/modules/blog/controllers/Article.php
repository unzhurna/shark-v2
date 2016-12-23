<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('article_model', 'article');
    }

    public function index()
    {
        $this->breadcrumbs->push('All Articles', '/');
        $data['content'] = $this->load->view('articles', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('article/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('article/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->article->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $article)
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $article->post_title;
            $row[] = $article->post_category;
            $row[] = $article->post_author;
            $row[] = format_dmy($article->post_create);
            $row[] = ($article->post_status == 'draft') ? '<label class="label label-danger">draft</label>' : '<label class="label label-info">publish</label>';
            $row[] = $this->_get_button($article->post_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->article->count_all(),
			'recordsFiltered' => $this->article->count_filtered(),
			'data' => $data,
		);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    public function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->breadcrumbs->push('All Articles', '/articles');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Article', '/');
            $data = array(
                'post_id' => '',
                'post_title' => '',
                'post_slug' => '',
                'post_content' => '',
                'category_id' => '',
                'post_status' => '',
                'post_image' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Article', '/');
            $data = (array) $this->article->get_detail_article($id);
        }

        $this->form_validation->set_rules('post_title', 'post title', 'required');
        $this->form_validation->set_rules('post_content', 'post content', 'required');
        $this->form_validation->set_rules('category_id', 'post category', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'post_id' => $id,
                'post_author' => login_data('id'),
                'post_title' => $this->input->post('post_title'),
                'post_content' => $this->input->post('post_content'),
                'post_excerpt' => post_excerpt($this->input->post('post_content')),
                'post_slug' => $this->input->post('post_slug'),
                'category_id' => $this->input->post('category_id'),
                'post_status' => $this->input->post('post_status'),
                'post_image' => basename($this->input->post('post_image')),
            );
            $this->article->submit_form_data($save);
            redirect('articles');
        }
        else
        {
            $data['categories'] = $this->article->get_all_category();
            $data['content'] = $this->load->view('form-article', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->article->delete_article($id);
        $this->session->set_flashdata('message', 'Success, Article has been deleted!');
        redirect('articles');
    }

}
