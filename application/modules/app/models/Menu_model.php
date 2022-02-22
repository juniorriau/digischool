<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public $table = 'settings';
    public $id = 'id';
    public $order = 'ASC';
    public $setting_name = 'site_menu';

    function __construct() {
        parent::__construct();
    }

    function get_menu() {
        $this->db->where('setting_name', $this->setting_name);
        return $this->db->get($this->table)->row();
    }

    function update_menu($data) {
        $this->db->where('setting_name', $this->setting_name);
        $this->db->update($this->table, $data);
    }

}
