<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

    var $table          = 'categories';
    var $column_order   = array(null, 'category_name', 'category_desc', 'is_show', null);
    var $column_search  = array('category_name', 'is_show');
    var $order          = array('category_id' => 'asc');

    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->where(array('category_term'=>'article'));

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

    public function get_detail_category($id)
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_id', $id);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    public function submit_form_data($data)
    {
        if(!empty($data['category_id']))
        {
            $this->db->set($data);
            $this->db->where('category_id', $data['category_id']);
            $this->db->update('categories');
            $this->session->set_flashdata('message', 'Success, Category has been updated!');
        }
        else
        {
            unset($data['category_id']);
            $this->db->set($data);
            $this->db->insert('categories');
            $this->session->set_flashdata('message', 'Success, Category has been added!');
        }

    }

    public function delete_category($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('categories');
    }

}
