<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Files extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Files_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'files/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'files/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'files/index.html';
            $config['first_url'] = base_url() . 'files/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Files_model->total_rows($q);
        $files = $this->Files_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'files_data' => $files,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('files/files_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Files_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'file_title' => $row->file_title,
		'enrolledto' => $row->enrolledto,
		'file_name' => $row->file_name,
		'file_path' => $row->file_path,
		'full_path' => $row->full_path,
		'createdby' => $row->createdby,
		'createdat' => $row->createdat,
		'updatedby' => $row->updatedby,
		'updatedat' => $row->updatedat,
	    );
            $this->load->view('files/files_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('files/create_action'),
	    'id' => set_value('id'),
	    'file_title' => set_value('file_title'),
	    'enrolledto' => set_value('enrolledto'),
	    'file_name' => set_value('file_name'),
	    'file_path' => set_value('file_path'),
	    'full_path' => set_value('full_path'),
	    'createdby' => set_value('createdby'),
	    'createdat' => set_value('createdat'),
	    'updatedby' => set_value('updatedby'),
	    'updatedat' => set_value('updatedat'),
	);
        $this->load->view('files/files_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'file_title' => $this->input->post('file_title',TRUE),
		'enrolledto' => $this->input->post('enrolledto',TRUE),
		'file_name' => $this->input->post('file_name',TRUE),
		'file_path' => $this->input->post('file_path',TRUE),
		'full_path' => $this->input->post('full_path',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
	    );

            $this->Files_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('files'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Files_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('files/update_action'),
		'id' => set_value('id', $row->id),
		'file_title' => set_value('file_title', $row->file_title),
		'enrolledto' => set_value('enrolledto', $row->enrolledto),
		'file_name' => set_value('file_name', $row->file_name),
		'file_path' => set_value('file_path', $row->file_path),
		'full_path' => set_value('full_path', $row->full_path),
		'createdby' => set_value('createdby', $row->createdby),
		'createdat' => set_value('createdat', $row->createdat),
		'updatedby' => set_value('updatedby', $row->updatedby),
		'updatedat' => set_value('updatedat', $row->updatedat),
	    );
            $this->load->view('files/files_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'file_title' => $this->input->post('file_title',TRUE),
		'enrolledto' => $this->input->post('enrolledto',TRUE),
		'file_name' => $this->input->post('file_name',TRUE),
		'file_path' => $this->input->post('file_path',TRUE),
		'full_path' => $this->input->post('full_path',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
	    );

            $this->Files_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('files'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Files_model->get_by_id($id);

        if ($row) {
            $this->Files_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('files'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('file_title', 'file title', 'trim|required');
	$this->form_validation->set_rules('enrolledto', 'enrolledto', 'trim|required');
	$this->form_validation->set_rules('file_name', 'file name', 'trim|required');
	$this->form_validation->set_rules('file_path', 'file path', 'trim|required');
	$this->form_validation->set_rules('full_path', 'full path', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Files.php */
/* Location: ./application/controllers/Files.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */