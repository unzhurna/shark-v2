<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller{

    public function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
        }
        $this->breadcrumbs->push('<i class="fa fa-home"></i>', '/dashboard');
        $this->load->model('product_model', 'product');
    }

    public function index()
    {
        $this->breadcrumbs->push('Products', '/');
        $data['content'] = $this->load->view('products', '', TRUE);
        $this->load->view_admin('template', $data);
    }

    private function _get_button($id)
    {
        $button = '<div class="btn btn-group">';
        $button .= '<a class="btn btn-link" title="edit" href="'.site_url('product/edit/'.$id).'"><i class="fa fa-edit"></i></a>';
        $button .= '<a class="btn btn-link btn-del" title="delete" href="'.site_url('product/delete/'.$id).'"><i class="fa fa-trash"></i></a>';
        $button .= '</div>';
        return $button;
    }

    public function ajax_grid()
    {
		$list = $this->product->get_datatables();
        $data = array();
        foreach ($list as $product)
        {
            $row = array();
            $row[] = '<img class="img-part img-bordered-sm" src="'.base_url('uploads/product/'.$product->prod_image).'" alt="'.$product->prod_name.'">';
            $row[] = $product->prod_name;
            $row[] = $product->category_name;
            $row[] = $this->_get_button($product->prod_id);

            $data[] = $row;
        }

        $output = array(
			'draw' => $_POST['draw'],
			'recordsTotal' => $this->product->count_all(),
			'recordsFiltered' => $this->product->count_filtered(),
			'data' => $data,
		);

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($output));
    }

    function submit($id=null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        if(empty($id))
        {
            $this->breadcrumbs->push('Add Product', '/');
            $data = array(
                'prod_id' => '',
                'prod_name' => '',
                'prod_slug' => '',
                'prod_desc' => '',
                'prod_fiture' => '',
                'prod_spec' => '',
                'prod_video' => '',
                'prod_image' => '',
                'prod_manual' => '',
                'category_id' => '',
                'prod_status' => '',
            );
        }
        else
        {
            $this->breadcrumbs->push('Edit Product', '/');
            $data = (array) $this->product->get_detail_product($id);
            $data['parts'] = $this->product->get_product_parts($id);
        }

        $this->form_validation->set_rules('prod_name', 'product name', 'required');
        $this->form_validation->set_rules('prod_desc', 'product description', 'required');
        $this->form_validation->set_rules('prod_fiture', 'product fiture', 'required');
        $this->form_validation->set_rules('prod_spec', 'product specification', 'required');
        $this->form_validation->set_rules('category_id', 'product category', 'required');

        if($this->form_validation->run() == TRUE)
        {
            $save = array(
                'prod_id' => $id,
                'prod_name' => $this->input->post('prod_name'),
                'prod_slug' => $this->input->post('prod_slug'),
                'prod_desc' => $this->input->post('prod_desc'),
                'prod_fiture' => $this->input->post('prod_fiture'),
                'prod_spec' => $this->input->post('prod_spec'),
                'prod_video' => $this->input->post('prod_video'),
                'prod_image' => basename($this->input->post('prod_image')),
                'prod_manual' => basename($this->input->post('prod_manual')),
                'category_id' => $this->input->post('category_id'),
                'prod_status' => $this->input->post('prod_status'),
            );
            $save2['spareparts'] = $this->input->post('part_id');
            $this->product->submit_form_data($save, $save2);
            redirect('products');
        }
        else
        {
            $data['spareparts'] = $this->product->get_all_parts();
            $data['categories'] = $this->product->get_all_category();
            $data['content'] = $this->load->view('form-product', $data, TRUE);
            $this->load->view_admin('template', $data);
        }
    }

    public function delete($id)
    {
        $this->product->delete_product($id);
        $this->session->set_flashdata('message', 'Success, Product has been deleted!');
        redirect('products');
    }
}
