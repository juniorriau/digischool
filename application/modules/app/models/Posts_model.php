<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts_model extends CI_Model {

    public $table = 'posts';
    public $id = 'id';
    public $order = 'Desc';
    public $type = 'posts';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->where('type', $this->type);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where('type', $this->type);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    //get data by slug
    function get_by_slug($slug, $status = '') {
        $this->db->select('p.*, c.category, c.slug as cslug, u.username,ud.fullname,ud.image as userimage');
        $this->db->from('posts p');
        $this->db->join('categories c', 'c.id=p.categoryid', 'left');
        $this->db->join('users u', 'u.id=c.createdby');
        $this->db->join('userdetails ud', 'ud.userid=u.id');
        $this->db->where('p.type', $this->type);
        $this->db->where('p.poststatus', $status);
        $this->db->where('p.slug', $slug);
        return $this->db->get()->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('p.*, c.category');
        $this->db->from('posts p');
        $this->db->join('categories c', 'c.id=p.categoryid', 'left');
        $this->db->where('p.type', $this->type);
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('p.id', $q);
        $this->db->or_like('p.guuid', $q);
        $this->db->or_like('p.title', $q);
        $this->db->or_like('p.categoryid', $q);
        $this->db->or_like('p.content', $q);
        $this->db->or_like('p.postimage', $q);
        $this->db->or_like('p.type', $q);
        $this->db->or_like('p.metapost', $q);
        $this->db->or_like('p.keywords', $q);
        $this->db->or_like('p.commentstatus', $q);
        $this->db->or_like('p.poststatus', $q);
        $this->db->or_like('p.createdat', $q);
        $this->db->or_like('p.createdby', $q);
        $this->db->or_like('p.updatedat', $q);
        $this->db->or_like('p.updatedby', $q);
        $this->db->or_like('c.category', $q);
        $this->db->group_end();
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('p.*, c.category, c.slug as cslug, u.username,ud.fullname,ud.image as userimage');
        $this->db->from('posts p');
        $this->db->join('categories c', 'c.id=p.categoryid', 'left');
        $this->db->join('users u', 'u.id=c.createdby');
        $this->db->join('userdetails ud', 'ud.userid=u.id');
        $this->db->where('p.type', $this->type);
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('p.id', $q);
        $this->db->or_like('p.guuid', $q);
        $this->db->or_like('p.title', $q);
        $this->db->or_like('p.categoryid', $q);
        $this->db->or_like('p.content', $q);
        $this->db->or_like('p.postimage', $q);
        $this->db->or_like('p.type', $q);
        $this->db->or_like('p.metapost', $q);
        $this->db->or_like('p.keywords', $q);
        $this->db->or_like('p.commentstatus', $q);
        $this->db->or_like('p.poststatus', $q);
        $this->db->or_like('p.createdat', $q);
        $this->db->or_like('p.createdby', $q);
        $this->db->or_like('p.updatedat', $q);
        $this->db->or_like('p.updatedby', $q);
        $this->db->or_like('c.category', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    function get_public_post($limit, $cslug = NULL, $start = 0, $q = NULL) {
        $this->db->select('p.*, c.category, c.slug as cslug, u.username,ud.fullname,ud.image as userimage');
        $this->db->from('posts p');
        $this->db->join('categories c', 'c.id=p.categoryid');
        $this->db->join('users u', 'u.id=c.createdby');
        $this->db->join('userdetails ud', 'ud.userid=u.id');
        $this->db->where('p.type', $this->type);
        $this->db->where('p.poststatus', 'Public');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('c.slug', $cslug);
        $this->db->group_start();
        $this->db->or_like('p.id', $q);
        $this->db->or_like('p.guuid', $q);
        $this->db->or_like('p.title', $q);
        $this->db->or_like('p.categoryid', $q);
        $this->db->or_like('p.content', $q);
        $this->db->or_like('p.postimage', $q);
        $this->db->or_like('p.type', $q);
        $this->db->or_like('p.metapost', $q);
        $this->db->or_like('p.keywords', $q);
        $this->db->or_like('p.commentstatus', $q);
        $this->db->or_like('p.poststatus', $q);
        $this->db->or_like('p.createdat', $q);
        $this->db->or_like('p.createdby', $q);
        $this->db->or_like('p.updatedat', $q);
        $this->db->or_like('p.updatedby', $q);
        $this->db->or_like('c.category', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->where('type', $this->type);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->where('type', $this->type);
        $this->db->delete($this->table);
    }

}

/* End of file Posts_model.php */
/* Location: ./application/models/Posts_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-21 12:45:37 */
/* http://harviacode.com */