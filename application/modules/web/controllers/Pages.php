<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('app/Pages_model');
    }

    public function index() {
        $page = $this->Pages_model->get_by_slug('page', $this->uri->segment(3));
        if (!empty($page)) {
            $data = array(
                "template" => 'pages',
                "page" => $page,
            );
        } else {
            $data = array(
                "template" => '404',
            );
        }
        $this->load->view('base/content', $data);
    }

}
