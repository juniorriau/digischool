<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('app/Places_model');
        $this->load->model('app/Placecategory_model');
        $this->load->model('app/Facilities_model');
    }

    public function index() {
        $placecategory = $this->Placecategory_model->get_all();
        $places = $this->Places_model->get_limit_data(12);
        $facility = $this->Facilities_model->get_all();
        $newplace = $this->Places_model->get_limit_data(3);
        $data = array(
            'template' => 'home',
            'facility' => $facility,
            'places' => $places,
            'placecategory' => $placecategory,
            'newplace' => $newplace,
            'extrajs' => 'base/home_extrajs',
        );
        $this->load->view('base/content', $data);
    }

}
