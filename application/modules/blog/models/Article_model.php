<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{

    var $table = 'articles';
    var $column_order = array(null, 'post_title','post_category', 'post_author', 'post_create', 'post_status', null);
    var $column_search = array('post_title','post_category','post_author','post_create', 'post_status');
    var $order = array('post_id' => 'asc');

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item)
        {
            if(isset($_POST['search']['value']))
            {
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where(array('category_term'=>'article', 'is_show'=>1));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_article()
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('post_status', 'publish');
        $this->db->limit(3, 1);
        $this->db->order_by('post_create');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_article($id)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('post_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function submit_form_data($data)
    {
        if(!empty($data['post_id']))
        {
            $data['post_update'] = date('Y-m-d h:i:s');
            $this->db->set($data);
            $this->db->where('post_id', $data['post_id']);
            $this->db->update('posts');
            $this->session->set_flashdata('message', 'Success, Article has been updated!');
        }
        else
        {
            unset($data['post_id']);
            $data['post_create'] = date('Y-m-d h:i:s');
            $this->db->set($data);
            $this->db->insert('posts');
            $this->session->set_flashdata('message', 'Success, Article has been added!');
        }
    }

    public function delete_article($id)
    {
        $this->db->where('post_id', $id);
        $this->db->delete('posts');
    }

}
