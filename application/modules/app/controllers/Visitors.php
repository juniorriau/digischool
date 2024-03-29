<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitors extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Visitors_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'visitors/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'visitors/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'visitors/index.html';
            $config['first_url'] = base_url() . 'visitors/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Visitors_model->total_rows($q);
        $visitors = $this->Visitors_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'visitors_data' => $visitors,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('visitors/visitors_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Visitors_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ipaddress' => $row->ipaddress,
		'referrer' => $row->referrer,
	    );
            $this->load->view('visitors/visitors_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visitors'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('visitors/create_action'),
	    'id' => set_value('id'),
	    'ipaddress' => set_value('ipaddress'),
	    'referrer' => set_value('referrer'),
	);
        $this->load->view('visitors/visitors_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ipaddress' => $this->input->post('ipaddress',TRUE),
		'referrer' => $this->input->post('referrer',TRUE),
	    );

            $this->Visitors_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('visitors'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Visitors_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('visitors/update_action'),
		'id' => set_value('id', $row->id),
		'ipaddress' => set_value('ipaddress', $row->ipaddress),
		'referrer' => set_value('referrer', $row->referrer),
	    );
            $this->load->view('visitors/visitors_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visitors'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'ipaddress' => $this->input->post('ipaddress',TRUE),
		'referrer' => $this->input->post('referrer',TRUE),
	    );

            $this->Visitors_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('visitors'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Visitors_model->get_by_id($id);

        if ($row) {
            $this->Visitors_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('visitors'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visitors'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
	$this->form_validation->set_rules('referrer', 'referrer', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Visitors.php */
/* Location: ./application/controllers/Visitors.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */