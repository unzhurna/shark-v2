<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    var $table = 'view_product';
    var $column_order = array(null, 'prod_name','category_name', null);
    var $column_search = array('prod_name','category_name');
    var $order = array('prod_id' => 'desc');

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

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
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

    public function get_product_parts($id)
    {
        $this->db->select('part_id');
        $this->db->from('products_parts');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function get_all_parts()
    {
        $this->db->select('*');
        $this->db->from('spareparts');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function get_all_project()
    {
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->limit(8, 1);
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('category_term', 'product');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    function get_detail_product($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('prod_id', $id);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    public function submit_form_data($data1, $data2)
    {
        if(!empty($data1['prod_id']))
        {
            $this->db->trans_start();
            //Update data product
            $data1['_update_at'] = date('Y-m-d h:i:s');
            $data1['_update_by'] = login_data('id');;
            $this->db->set($data1);
            $this->db->where('prod_id', $data1['prod_id']);
            $this->db->update('products');
            //Delete data product parts
            $this->db->where('product_id', $data1['prod_id']);
            $this->db->delete('products_parts');
            //Update data parts
            foreach ($data2['spareparts'] as $value)
    		{
    			$item['part_id'] = $value;
    			$item['product_id'] = $data1['prod_id'];
                $this->db->set($item);
                $this->db->insert('products_parts');
    		}
    		$this->db->trans_complete();
            $this->session->set_flashdata('message', 'Success, Product has been updated!');
        }
        else
        {
            $this->db->trans_start();
            unset($data['prod_id']);
            //Create data product
            $data1['_create_at'] = date('Y-m-d h:i:s');
            $data1['_create_by'] = login_data('id');
            $this->db->set($data1);
            $this->db->insert('products');
            $prod_id = $this->db->insert_id();
            //Create data parts
            foreach ($data2['spareparts'] as $value)
    		{
    			$item['part_id'] = $value;
    			$item['product_id'] = $prod_id;
                $this->db->set($item);
                $this->db->insert('products_parts');
    		}
            $this->db->trans_complete();
            $this->session->set_flashdata('message', 'Success, Product has been added!');
        }

    }

    public function delete_product($id)
    {
        $this->db->where('prod_id', $id);
        $this->db->delete('products');
    }

}
