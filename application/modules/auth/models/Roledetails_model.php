<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roledetails_model extends CI_Model {

    public $table = 'roledetails';
    public $id = 'id';
    public $roleid = 'roleid';
    public $order = 'ASC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_roleid($id) {
        $this->db->select('rd.*, r.rolename');
        $this->db->from('roledetails rd');
        $this->db->join('roles r', 'r.id=rd.roleid', 'left');
        $this->db->where('rd.roleid', $id);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('roleid', $q);
        $this->db->or_like('rolelist', $q);
        $this->db->or_like('roleaction', $q);
        $this->db->or_like('createdat', $q);
        $this->db->or_like('createdby', $q);
        $this->db->or_like('updatedat', $q);
        $this->db->or_like('updatedby', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('roleid', $q);
        $this->db->or_like('rolelist', $q);
        $this->db->or_like('roleaction', $q);
        $this->db->or_like('createdat', $q);
        $this->db->or_like('createdby', $q);
        $this->db->or_like('updatedat', $q);
        $this->db->or_like('updatedby', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    //update data by roleid
    function update_by_roleid($id, $data) {
        $this->db->where($this->roleid, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Roledetails_model.php */
/* Location: ./application/models/Roledetails_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-04 05:07:58 */
/* http://harviacode.com */