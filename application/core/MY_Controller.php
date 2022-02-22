<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('app/Settings_model');
        $this->load->model('auth/Routings_model');
        $this->_loadConfig();
    }

    public function _loadConfig() {
        foreach ($this->Settings_model->get_all() as $s) {
            $this->config->set_item($s->setting_name, $s->setting_value);
        }
        $this->config->set_item('base_url', $this->config->item('site_url'));
        $this->config->set_item('site_url', $this->config->item('site_url'));
    }

    public function _auth($uri) {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            $this->session->set_flashdata('message', 'Please login!');
            $this->session->set_flashdata('redirect_back', $uri);
            redirect(base_url('auth/authentication'));
        }
    }

}
