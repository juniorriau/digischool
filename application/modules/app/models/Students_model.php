<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students_model extends CI_Model
{

    public $table = 'students';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->select('s.*, c.classname');
        $this->db->from('students s');
        $this->db->join('classes c', 'c.id=s.classid', 'left');
        $this->db->order_by('s.id', $this->order);
        $this->db->group_start();
        $this->db->like('s.id', $q);
        $this->db->or_like('s.classid', $q);
        $this->db->or_like('s.name', $q);
        $this->db->or_like('s.nisn', $q);
        $this->db->or_like('s.createdby', $q);
        $this->db->or_like('s.createdat', $q);
        $this->db->or_like('s.updatedby', $q);
        $this->db->or_like('s.updatedat', $q);
        $this->db->or_like('c.classname', $q);
        $this->db->group_end();
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->select('s.*, c.classname');
        $this->db->from('students s');
        $this->db->join('classes c', 'c.id=s.classid', 'left');
        $this->db->order_by('s.id', $this->order);
        $this->db->group_start();
        $this->db->like('s.id', $q);
        $this->db->or_like('s.classid', $q);
        $this->db->or_like('s.name', $q);
        $this->db->or_like('s.nisn', $q);
        $this->db->or_like('s.createdby', $q);
        $this->db->or_like('s.createdat', $q);
        $this->db->or_like('s.updatedby', $q);
        $this->db->or_like('s.updatedat', $q);
        $this->db->or_like('c.classname', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Students_model.php */
/* Location: ./application/models/Students_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */