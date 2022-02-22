<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public $sess;

    public function __construct() {
        parent::__construct();
        parent::_auth($this->uri->uri_string());
        $this->sess = $this->session->logged_in;
    }

    public function index() {
       
        $data = array(
            "template" => 'home/dashboard',
            "session" => $this->sess,
        );
        $this->load->view('base/content', $data);
    }

}
