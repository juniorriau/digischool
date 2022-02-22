<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends MY_Controller {
    public $sess;
    function __construct() {
        parent::__construct();
        parent::_auth($this->uri->uri_string());
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
        $this->sess = $this->session->logged_in;
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'app/categories/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'app/categories/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'app/categories/index';
            $config['first_url'] = base_url() . 'app/categories/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Categories_model->total_rows($q);
        $categories = $this->Categories_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'categories_data' => $categories,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'template' => 'categories/categories_list',
            'session' => $this->sess,
        );
        $this->load->view('base/content', $data);
    }



    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('app/categories/create_action'),
	    'id' => set_value('id'),
	    'category' => set_value('category'),
	    'description' => set_value('description'),
        'template' => 'categories/categories_form',
        'session' => $this->sess,
    );
    $this->load->view('base/content', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'category' => $this->input->post('category',TRUE),
                'slug' => url_title($this->input->post('category', TRUE), "-", TRUE),
                'description' => $this->input->post('description',TRUE),
                'createdat' => date("Y-m-d H:i:s"),
                'createdby' => $this->sess['id'],
                'updatedat' => date("Y-m-d H:i:s"),
                'updatedby' => $this->sess['id'],
                );

            $this->Categories_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('app/categories'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('app/categories/update_action'),
                'id' => set_value('id', $row->id),
                'category' => set_value('category', $row->category),
                'slug' => set_value('slug', $row->slug),
                'description' => set_value('description', $row->description),
                'template' => 'categories/categories_form',
                    'session' => $this->sess,
                );
        $this->load->view('base/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/categories'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'category' => $this->input->post('category',TRUE),
		'slug' => url_title($this->input->post('category', TRUE), "-", TRUE),
		'description' => $this->input->post('description',TRUE),
        'updatedat' => date("Y-m-d H:i:s"),
        'updatedby' => $this->sess['id'],
	    );

            $this->Categories_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('app/categories'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $this->Categories_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('app/categories'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/categories'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Categories.php */
/* Location: ./application/controllers/Categories.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */