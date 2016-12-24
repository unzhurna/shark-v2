<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_model extends CI_Model{

    var $table = 'partners';
    var $column_order = array(null, 'partner_name','partner_phone', 'partner_email', null);
    var $column_search = array('partner_name','partner_phone','partner_email');
    var $order = array('partner_id' => 'asc');

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

    public function get_all_partner()
    {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->limit(8, 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_province()
    {
        $this->db->select('*');
        $this->db->from('provinces');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_cities($id)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_partner($id)
    {
        $this->db->select('*');
        $this->db->from('partners');
        $this->db->where('partner_id', $id);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    public function submit_form_data($data)
    {
        if(!empty($data['partner_id']))
        {
            $data['_update_at'] = date('Y-m-d h:i:s');
            $data['_update_by'] = login_data('id');
            $this->db->set($data);
            $this->db->where('partner_id', $data['partner_id']);
            $this->db->update('partners');
            $this->session->set_flashdata('message', 'Success, Data has been updated!');
        }
        else
        {
            unset($data['partner_id']);
            $data['_create_at'] = date('Y-m-d h:i:s');
            $data['_create_by'] = login_data('id');
            $this->db->set($data);
            $this->db->insert('partners');
            $this->session->set_flashdata('message', 'Success, Data has been added!');
        }
    }

    public function delete_partner($id)
    {
        $this->db->where('partner_id', $id);
        $this->db->delete('partners');
    }

}
