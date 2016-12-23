<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model{

    var $table = 'banners';
    var $column_order = array(null, 'banner','status', null);
    var $column_search = array('banner');
    var $order = array('id' => 'asc');

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

    public function get_all_banner()
    {
        $this->db->select('*');
        $this->db->from('banners');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_detail_banner($id)
    {
        $this->db->select('*');
        $this->db->from('banners');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $return = $query->row_array();
        return $return;
    }

    public function submit_form_data($data)
    {
        if(!empty($data['id']))
        {
            $data['_update_at'] = date('Y-m-d h:i:s');
            $data['_update_by'] = login_data('id');
            $this->db->set($data);
            $this->db->where('id', $data['id']);
            $this->db->update('banners');
            $this->session->set_flashdata('message', 'Success, Data has been updated!');
        }
        else
        {
            unset($data['id']);
            $data['_create_at'] = date('Y-m-d h:i:s');
            $data['_create_by'] = login_data('id');
            $this->db->set($data);
            $this->db->insert('banners');
            $this->session->set_flashdata('message', 'Success, Data has been added!');
        }
    }

    public function delete_project($id)
    {
        $this->db->where('project_id', $id);
        $this->db->delete('projects');
    }

}
