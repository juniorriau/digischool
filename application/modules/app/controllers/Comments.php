<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comments_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'comments/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'comments/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'comments/index.html';
            $config['first_url'] = base_url() . 'comments/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Comments_model->total_rows($q);
        $comments = $this->Comments_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'comments_data' => $comments,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('comments/comments_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Comments_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'postid' => $row->postid,
		'comment' => $row->comment,
		'authorname' => $row->authorname,
		'authoremail' => $row->authoremail,
		'authorip' => $row->authorip,
		'approved' => $row->approved,
		'createdat' => $row->createdat,
		'createdby' => $row->createdby,
		'updatedat' => $row->updatedat,
		'updatedby' => $row->updatedby,
	    );
            $this->load->view('comments/comments_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('comments/create_action'),
	    'id' => set_value('id'),
	    'postid' => set_value('postid'),
	    'comment' => set_value('comment'),
	    'authorname' => set_value('authorname'),
	    'authoremail' => set_value('authoremail'),
	    'authorip' => set_value('authorip'),
	    'approved' => set_value('approved'),
	    'createdat' => set_value('createdat'),
	    'createdby' => set_value('createdby'),
	    'updatedat' => set_value('updatedat'),
	    'updatedby' => set_value('updatedby'),
	);
        $this->load->view('comments/comments_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'postid' => $this->input->post('postid',TRUE),
		'comment' => $this->input->post('comment',TRUE),
		'authorname' => $this->input->post('authorname',TRUE),
		'authoremail' => $this->input->post('authoremail',TRUE),
		'authorip' => $this->input->post('authorip',TRUE),
		'approved' => $this->input->post('approved',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Comments_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('comments'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Comments_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('comments/update_action'),
		'id' => set_value('id', $row->id),
		'postid' => set_value('postid', $row->postid),
		'comment' => set_value('comment', $row->comment),
		'authorname' => set_value('authorname', $row->authorname),
		'authoremail' => set_value('authoremail', $row->authoremail),
		'authorip' => set_value('authorip', $row->authorip),
		'approved' => set_value('approved', $row->approved),
		'createdat' => set_value('createdat', $row->createdat),
		'createdby' => set_value('createdby', $row->createdby),
		'updatedat' => set_value('updatedat', $row->updatedat),
		'updatedby' => set_value('updatedby', $row->updatedby),
	    );
            $this->load->view('comments/comments_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'postid' => $this->input->post('postid',TRUE),
		'comment' => $this->input->post('comment',TRUE),
		'authorname' => $this->input->post('authorname',TRUE),
		'authoremail' => $this->input->post('authoremail',TRUE),
		'authorip' => $this->input->post('authorip',TRUE),
		'approved' => $this->input->post('approved',TRUE),
		'createdat' => $this->input->post('createdat',TRUE),
		'createdby' => $this->input->post('createdby',TRUE),
		'updatedat' => $this->input->post('updatedat',TRUE),
		'updatedby' => $this->input->post('updatedby',TRUE),
	    );

            $this->Comments_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('comments'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Comments_model->get_by_id($id);

        if ($row) {
            $this->Comments_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('comments'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comments'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('postid', 'postid', 'trim|required');
	$this->form_validation->set_rules('comment', 'comment', 'trim|required');
	$this->form_validation->set_rules('authorname', 'authorname', 'trim|required');
	$this->form_validation->set_rules('authoremail', 'authoremail', 'trim|required');
	$this->form_validation->set_rules('authorip', 'authorip', 'trim|required');
	$this->form_validation->set_rules('approved', 'approved', 'trim|required');
	$this->form_validation->set_rules('createdat', 'createdat', 'trim|required');
	$this->form_validation->set_rules('createdby', 'createdby', 'trim|required');
	$this->form_validation->set_rules('updatedat', 'updatedat', 'trim|required');
	$this->form_validation->set_rules('updatedby', 'updatedby', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Comments.php */
/* Location: ./application/controllers/Comments.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */