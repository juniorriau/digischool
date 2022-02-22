<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Students_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'students/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'students/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'students/index.html';
            $config['first_url'] = base_url() . 'students/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Students_model->total_rows($q);
        $students = $this->Students_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'students_data' => $students,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('students/students_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Students_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'classid' => $row->classid,
		'name' => $row->name,
		'nisn' => $row->nisn,
		'createdby' => $row->createdby,
		'createdat' => $row->createdat,
		'updatedby' => $row->updatedby,
		'updatedat' => $row->updatedat,
	    );
            $this->load->view('students/students_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('students/create_action'),
	    'id' => set_value('id'),
	    'classid' => set_value('classid'),
	    'name' => set_value('name'),
	    'nisn' => set_value('nisn'),
	    'createdby' => set_value('createdby'),
	    'createdat' => set_value('createdat'),
	    'updatedby' => set_value('updatedby'),
	    'updatedat' => set_value('updatedat'),
	);
        $this->load->view('students/students_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'classid' => $this->input->post('classid',TRUE),
		'name' => $this->input->post('name',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
	    );

            $this->Students_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('students'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Students_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('students/update_action'),
		'id' => set_value('id', $row->id),
		'classid' => set_value('classid', $row->classid),
		'name' => set_value('name', $row->name),
		'nisn' => set_value('nisn', $row->nisn),
		'createdby' => set_value('createdby', $row->createdby),
		'createdat' => set_value('createdat', $row->createdat),
		'updatedby' => set_value('updatedby', $row->updatedby),
		'updatedat' => set_value('updatedat', $row->updatedat),
	    );
            $this->load->view('students/students_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'classid' => $this->input->post('classid',TRUE),
		'name' => $this->input->post('name',TRUE),
		'nisn' => $this->input->post('nisn',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
	    );

            $this->Students_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('students'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Students_model->get_by_id($id);

        if ($row) {
            $this->Students_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('students'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('classid', 'classid', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('nisn', 'nisn', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */