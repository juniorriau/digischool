<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('app/Pages_model');
        $this->load->model("app/Posts_model");
        $this->load->model("app/Categories_model");
    }

    public function index() {
        $page = $this->Pages_model->get_by_slug('page', $this->uri->segment(3));
        $category = $this->Categories_model->get_all();
        $recentpost = $this->Posts_model->get_public_post($this->config->item("site_limit_post"));
        $categorycount = $this->Categories_model->get_posts_count();
        if (!empty($page)) {
            $data = array(
                "template" => 'pages',
                "page" => $page,
                "category" => $category,
                "recentpost" => $recentpost,
                "categorycount" => $categorycount,
            );
        } else {
            $data = array(
                "template" => '404',
            );
        }
        $this->load->view('base/content', $data);
    }

}
