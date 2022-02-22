<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galleries extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Galleries_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'galleries/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'galleries/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'galleries/index.html';
            $config['first_url'] = base_url() . 'galleries/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Galleries_model->total_rows($q);
        $galleries = $this->Galleries_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'galleries_data' => $galleries,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('galleries/galleries_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Galleries_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'galleryname' => $row->galleryname,
		'descriptions' => $row->descriptions,
		'content' => $row->content,
		'createdat' => $row->createdat,
		'createdby' => $row->createdby,
		'updatedat' => $row->updatedat,
		'updatedby' => $row->updatedby,
	    );
            $this->load->view('galleries/galleries_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galleries'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('galleries/create_action'),
	    'id' => set_value('id'),
	    'galleryname' => set_value('galleryname'),
	    'descriptions' => set_value('descriptions'),
	    'content' => set_value('content'),
	    'createdat' => set_value('createdat'),
	    'createdby' => set_value('createdby'),
	    'updatedat' => set_value('updatedat'),
	    'updatedby' => set_value('updatedby'),
	);
        $this->load->view('galleries/galleries_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'galleryname' => $this->input->post('galleryname',TRUE),
		'descriptions' => $this->input->post('descriptions',TRUE),
		'content' => $this->input->post('content',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Galleries_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('galleries'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Galleries_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('galleries/update_action'),
		'id' => set_value('id', $row->id),
		'galleryname' => set_value('galleryname', $row->galleryname),
		'descriptions' => set_value('descriptions', $row->descriptions),
		'content' => set_value('content', $row->content),
		'createdat' => set_value('createdat', $row->createdat),
		'createdby' => set_value('createdby', $row->createdby),
		'updatedat' => set_value('updatedat', $row->updatedat),
		'updatedby' => set_value('updatedby', $row->updatedby),
	    );
            $this->load->view('galleries/galleries_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galleries'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'galleryname' => $this->input->post('galleryname',TRUE),
		'descriptions' => $this->input->post('descriptions',TRUE),
		'content' => $this->input->post('content',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Galleries_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('galleries'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Galleries_model->get_by_id($id);

        if ($row) {
            $this->Galleries_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('galleries'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galleries'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('galleryname', 'galleryname', 'trim|required');
	$this->form_validation->set_rules('descriptions', 'descriptions', 'trim|required');
	$this->form_validation->set_rules('content', 'content', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Galleries.php */
/* Location: ./application/controllers/Galleries.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:38:09 */
/* http://harviacode.com */