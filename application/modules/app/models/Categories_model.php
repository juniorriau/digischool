<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public $table = 'categories';
    public $id = 'id';
    public $order = 'DESC';

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

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('category', $q);
        $this->db->or_like('slug', $q);
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
        $this->db->or_like('category', $q);
        $this->db->or_like('slug', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('createdat', $q);
        $this->db->or_like('createdby', $q);
        $this->db->or_like('updatedat', $q);
        $this->db->or_like('updatedby', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    //get post count
    function get_posts_count() {
        $this->db->select('c.*, count(p.id) as postcount');
        $this->db->from('categories c');
        $this->db->join('posts p', 'p.categoryid=c.id', 'left');
        $this->db->group_by('c.category');
        return $this->db->get()->result();
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

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Categories_model.php */
/* Location: ./application/models/Categories_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */