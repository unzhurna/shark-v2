<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shark_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    function record_count($table)
    {
        $query = $this->db->count_all($table);
        return $query;
    }

    function fetch_data($table, $limit, $page, $param=false)
    {
        $this->db->from($table);
        if($param)
        {
            $this->db->where($param['col'], $param['con']);
        }
        $this->db->limit($limit, (($page-1) * $limit));
        $query = $this->db->get();

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    function list_of_articles()
    {
        $this->db->select('*');
        $this->db->from();
        $articles = $this->db->get();
        return $articles->result();
    }

    function detail_of_article($param)
    {
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->where('post_slug', $param);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    function detail_of_page($param)
    {
        $this->db->select('*');
        $this->db->from('view_pages');
        $this->db->where('page_slug', $param);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    function list_of_products($param=false)
    {
        $this->db->select('*');
        $this->db->from('view_product');
        if($param)
        {
            $this->db->where('category_slug', $param);
        }
        $this->db->where('prod_status', 'publish');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }


    function detail_of_product($param)
    {
        $this->db->select('*');
        $this->db->from('view_product');
        $this->db->where('prod_slug', $param);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    function list_of_parts($prod_id)
    {
        $this->db->select('*');
        $this->db->from('view_part');
        $this->db->where('product_id', $prod_id);
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    function list_of_sales()
    {
        $this->db->select('*');
        $this->db->from('sales');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function submit_cv($data)
    {
        $this->db->set($data);
        $this->db->insert('applicants');
    }


}
