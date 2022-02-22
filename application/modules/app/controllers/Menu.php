<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends MY_Controller {

    public $sess;

    function __construct() {
        parent::__construct();
        parent::_auth($this->uri->uri_string());
        $this->load->model('Pages_model');
        $this->load->model('Placecategory_model');
        $this->load->library('form_validation');
        $this->load->model('Menu_model');
        $this->sess = $this->session->logged_in;
    }

    public function index() {
        $menu = $this->Menu_model->get_menu();
        $pages = $this->Pages_model->get_all();
        $placecategory = $this->Placecategory_model->get_all();
        $data = array(
            'button' => 'Save',
            'action' => site_url('app/menu/save_action'),
            'template' => 'menu/menu_form',
            'session' => $this->sess,
            'extracss' => 'menu/menu_css_nestable',
            'extrajs' => 'menu/menu_js_nestable',
            'pages' => $pages,
            'placecategory' => $placecategory,
            'site_menu' => json_decode($menu->setting_value),
        );

        $this->load->view('base/content', $data);
    }

    public function save_action() {
        $this->Menu_model->update_menu(array('setting_value' => $this->input->post('nestable_menu_output', TRUE)));
        redirect(site_url('app/menu'));
    }

}
