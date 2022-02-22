<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Posts_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'posts/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'posts/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'posts/index.html';
            $config['first_url'] = base_url() . 'posts/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Posts_model->total_rows($q);
        $posts = $this->Posts_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'posts_data' => $posts,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('posts/posts_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Posts_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'guuid' => $row->guuid,
		'title' => $row->title,
		'slug' => $row->slug,
		'content' => $row->content,
		'categoryid' => $row->categoryid,
		'postimage' => $row->postimage,
		'type' => $row->type,
		'metapost' => $row->metapost,
		'keywords' => $row->keywords,
		'commentstatus' => $row->commentstatus,
		'poststatus' => $row->poststatus,
		'createdat' => $row->createdat,
		'createdby' => $row->createdby,
		'updatedat' => $row->updatedat,
		'updatedby' => $row->updatedby,
	    );
            $this->load->view('posts/posts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('posts'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('posts/create_action'),
	    'id' => set_value('id'),
	    'guuid' => set_value('guuid'),
	    'title' => set_value('title'),
	    'slug' => set_value('slug'),
	    'content' => set_value('content'),
	    'categoryid' => set_value('categoryid'),
	    'postimage' => set_value('postimage'),
	    'type' => set_value('type'),
	    'metapost' => set_value('metapost'),
	    'keywords' => set_value('keywords'),
	    'commentstatus' => set_value('commentstatus'),
	    'poststatus' => set_value('poststatus'),
	    'createdat' => set_value('createdat'),
	    'createdby' => set_value('createdby'),
	    'updatedat' => set_value('updatedat'),
	    'updatedby' => set_value('updatedby'),
	);
        $this->load->view('posts/posts_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'guuid' => $this->input->post('guuid',TRUE),
		'title' => $this->input->post('title',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'content' => $this->input->post('content',TRUE),
		'categoryid' => $this->input->post('categoryid',TRUE),
		'postimage' => $this->input->post('postimage',TRUE),
		'type' => $this->input->post('type',TRUE),
		'metapost' => $this->input->post('metapost',TRUE),
		'keywords' => $this->input->post('keywords',TRUE),
		'commentstatus' => $this->input->post('commentstatus',TRUE),
		'poststatus' => $this->input->post('poststatus',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Posts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('posts'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Posts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('posts/update_action'),
		'id' => set_value('id', $row->id),
		'guuid' => set_value('guuid', $row->guuid),
		'title' => set_value('title', $row->title),
		'slug' => set_value('slug', $row->slug),
		'content' => set_value('content', $row->content),
		'categoryid' => set_value('categoryid', $row->categoryid),
		'postimage' => set_value('postimage', $row->postimage),
		'type' => set_value('type', $row->type),
		'metapost' => set_value('metapost', $row->metapost),
		'keywords' => set_value('keywords', $row->keywords),
		'commentstatus' => set_value('commentstatus', $row->commentstatus),
		'poststatus' => set_value('poststatus', $row->poststatus),
		'createdat' => set_value('createdat', $row->createdat),
		'createdby' => set_value('createdby', $row->createdby),
		'updatedat' => set_value('updatedat', $row->updatedat),
		'updatedby' => set_value('updatedby', $row->updatedby),
	    );
            $this->load->view('posts/posts_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('posts'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'guuid' => $this->input->post('guuid',TRUE),
		'title' => $this->input->post('title',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'content' => $this->input->post('content',TRUE),
		'categoryid' => $this->input->post('categoryid',TRUE),
		'postimage' => $this->input->post('postimage',TRUE),
		'type' => $this->input->post('type',TRUE),
		'metapost' => $this->input->post('metapost',TRUE),
		'keywords' => $this->input->post('keywords',TRUE),
		'commentstatus' => $this->input->post('commentstatus',TRUE),
		'poststatus' => $this->input->post('poststatus',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Posts_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('posts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Posts_model->get_by_id($id);

        if ($row) {
            $this->Posts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('posts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('posts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('guuid', 'guuid', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('categoryid', 'categoryid', 'trim|required');
	$this->form_validation->set_rules('postimage', 'postimage', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('metapost', 'metapost', 'trim|required');
	$this->form_validation->set_rules('keywords', 'keywords', 'trim|required');
	$this->form_validation->set_rules('commentstatus', 'commentstatus', 'trim|required');
	$this->form_validation->set_rules('poststatus', 'poststatus', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Posts.php */
/* Location: ./application/controllers/Posts.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */