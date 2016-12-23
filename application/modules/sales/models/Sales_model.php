<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model{

    public function get_all_sales()
    {
        $this->db->select('*');
        $this->db->from('sales');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_sales($id)
    {
        $this->db->select('*');
        $this->db->from('sales');
        $this->db->where('sales_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function submit_form_data($data)
    {
        if(!empty($data['sales_id']))
        {
            $this->db->set($data);
            $this->db->where('sales_id', $data['sales_id']);
            $this->db->update('sales');
            $this->session->set_flashdata('message', 'Success, Data has been updated!');
        }
        else
        {
            unset($data['sales_id']);
            $this->db->set($data);
            $this->db->insert('sales');
            $this->session->set_flashdata('message', 'Success, Data has been added!');
        }

    }

    public function delete_sales($id)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete('sales');
    }

}
