<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teachers extends MY_Controller {
    public $sess;
    function __construct() {
        parent::__construct();
        $this->load->model('Teachers_model');
        $this->load->model('Classes_model');
        $this->load->library('form_validation');
        $this->sess = $this->session->logged_in;
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'app/teachers/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'app/teachers/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'app/teachers/index';
            $config['first_url'] = base_url() . 'app/teachers/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Teachers_model->total_rows($q);
        $teachers = $this->Teachers_model->get_limit_data($config['per_page'], $start, $q);
        $class= $this->Classes_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'teachers_data' => $teachers,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'template' => 'teachers/teachers_list',
            'session' => $this->sess,
            'class'=>$class,
        );
        $this->load->view('base/content', $data);
    }

    public function create() 
    {
        $class=$this->Classes_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('app/teachers/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'nip' => set_value('nip'), 
	    'assignto' => json_encode(array()),
	    'createdby' => set_value('createdby'),
	    'createdat' => set_value('createdat'),
	    'updatedby' => set_value('updatedby'),
	    'updatedat' => set_value('updatedat'),
        'template' => 'teachers/teachers_form',
        'session' => $this->sess,
        'class'=>$class,
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
		'name' => $this->input->post('name',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'assignto' => json_encode($this->input->post('assignto', TRUE)),
        'createdat' => date("Y-m-d H:i:s"),
        'createdby' => $this->sess['id'],
        'updatedat' => date("Y-m-d H:i:s"),
        'updatedby' => $this->sess['id'],
	    );

            $this->Teachers_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('app/teachers'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Teachers_model->get_by_id($id);
        $class=$this->Classes_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('app/teachers/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'nip' => set_value('nip', $row->nip),
		'assignto' => set_value('assignto', json_decode($row->assignto)),
		'createdby' => set_value('createdby', $row->createdby),
		'createdat' => set_value('createdat', $row->createdat),
		'updatedby' => set_value('updatedby', $row->updatedby),
		'updatedat' => set_value('updatedat', $row->updatedat),
        'template' => 'teachers/teachers_form',
        'session' => $this->sess,
        'class'=>$class,
    );
    $this->load->view('base/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/teachers'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'assignto' => json_encode($this->input->post('assignto',TRUE)),
        'updatedat' => date("Y-m-d H:i:s"),
        'updatedby' => $this->sess['id'],
	    );

            $this->Teachers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('app/teachers'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Teachers_model->get_by_id($id);

        if ($row) {
            $this->Teachers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('app/teachers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/teachers'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('assignto[]', 'assignto[]', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Teachers.php */
/* Location: ./application/controllers/Teachers.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */