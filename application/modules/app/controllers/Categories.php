<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'categories/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'categories/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'categories/index.html';
            $config['first_url'] = base_url() . 'categories/index.html';
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
        );
        $this->load->view('categories/categories_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Categories_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'category' => $row->category,
		'slug' => $row->slug,
		'description' => $row->description,
		'createdat' => $row->createdat,
		'createdby' => $row->createdby,
		'updatedat' => $row->updatedat,
		'updatedby' => $row->updatedby,
	    );
            $this->load->view('categories/categories_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('categories/create_action'),
	    'id' => set_value('id'),
	    'category' => set_value('category'),
	    'slug' => set_value('slug'),
	    'description' => set_value('description'),
	    'createdat' => set_value('createdat'),
	    'createdby' => set_value('createdby'),
	    'updatedat' => set_value('updatedat'),
	    'updatedby' => set_value('updatedby'),
	);
        $this->load->view('categories/categories_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'category' => $this->input->post('category',TRUE),
		'slug' => $this->input->post('slug',TRUE),
		'description' => $this->input->post('description',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Categories_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('categories/update_action'),
		'id' => set_value('id', $row->id),
		'category' => set_value('category', $row->category),
		'slug' => set_value('slug', $row->slug),
		'description' => set_value('description', $row->description),
		'createdat' => set_value('createdat', $row->createdat),
		'createdby' => set_value('createdby', $row->createdby),
		'updatedat' => set_value('updatedat', $row->updatedat),
		'updatedby' => set_value('updatedby', $row->updatedby),
	    );
            $this->load->view('categories/categories_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
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
		'slug' => $this->input->post('slug',TRUE),
		'description' => $this->input->post('description',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Categories_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $this->Categories_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categories'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Categories.php */
/* Location: ./application/controllers/Categories.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */