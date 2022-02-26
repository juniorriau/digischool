<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app/Posts_model');
        $this->load->model('app/Categories_model');
        $this->load->model('app/Comments_model');
    }

    public function category($category)
    {

    }
    public function read($slug)
    {
        $post = $this->Posts_model->get_by_slug($slug, 'Public');
        $comments = $this->Comments_model->get_by_postid($post->id);
        $category = $this->Categories_model->get_all();
        if (!empty($post)) {
            $data = array(
                "template" => 'postdetail',
                "post" => $post,
                "comments" => $comments,
                "category" => $category,
            );
        }
        else {
            $data = array(
                "template" => '404',
                "post" => $post,
                "comments" => $comments,
                "category" => $category,
            );
        }
        $this->load->view('base/content', $data);
    }

    public function search($keyword)
    {

    }

    public function comment_action()
    {

    }
}