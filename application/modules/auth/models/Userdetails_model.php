<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userdetails_model extends CI_Model {

    public $table = 'userdetails';
    public $id = 'id';
    public $order = 'DESC';
    public $userid = 'userid';

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

    // get data by userid
    function get_by_userid($id) {
        $this->db->where($this->userid, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('userid', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('image', $q);
        $this->db->or_like('description', $q);
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
        $this->db->or_like('userid', $q);
        $this->db->or_like('fullname', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('url', $q);
        $this->db->or_like('image', $q);
        $this->db->or_like('description', $q);
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

    function update_by_userid($userid, $data) {
        $this->db->where($this->userid, $userid);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Userdetails_model.php */
/* Location: ./application/models/Userdetails_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-04 04:58:06 */
/* http://harviacode.com */