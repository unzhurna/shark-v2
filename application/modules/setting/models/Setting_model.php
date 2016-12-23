<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model{

    public function get_option($option)
    {
        $this->db->select('option_value');
        $this->db->from('options');
        $this->db->where('option_name', $option);
        $query = $this->db->get();
        $option = $query->row_array();
        return $option['option_value'];
    }

    public function get_address()
    {
        $this->db->select('*');
        $this->db->from('contact_addr');
        $query = $this->db->get();
        $addr = $query->result_array();
        return $addr;
    }

    public function update_option($options)
    {
        foreach ($options as $key => $value)
        {
            $this->db->set('option_value', $value);
            $this->db->where('option_name', $key);
            $this->db->update('options');
        }

    }

}
