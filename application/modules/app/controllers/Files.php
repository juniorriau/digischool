<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Files extends MY_Controller
{
    public $sess;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Files_model');
        $this->load->model('Classes_model');
        $this->load->library('form_validation');
        $this->sess = $this->session->logged_in;
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'app/files/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'app/files/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'app/files/index';
            $config['first_url'] = base_url() . 'app/files/index';
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
            'template' => 'files/files_list',
            'session' => $this->sess,
        );
        $this->load->view('base/content', $data);
    }


    public function create() 
    {
        $class=$this->Classes_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('app/files/create_action'),
	    'id' => set_value('id'),
	    'file_title' => set_value('file_title'),
	    'enrolledto' => set_value('enrolledto'),
	    'file_name' => set_value('file_name'),
	    'file_path' => set_value('file_path'),
	    'full_path' => set_value('full_path'),
        'expiredat' => set_value('expiredat'),
	    'createdby' => set_value('createdby'),
	    'createdat' => set_value('createdat'),
	    'updatedby' => set_value('updatedby'),
	    'updatedat' => set_value('updatedat'),
        'template' => 'files/files_form',
        'extrajs'=>'files/files_extrajs',
        'extracss'=>'files/files_extracss',
            'session' => $this->sess,
            'class'=>$class,
            'curfile' => '',
        );
        $this->load->view('base/content', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (!empty($_FILES['file'])) {
                $result = fileuploader($_FILES, "file", "", "pdf|docx|doc|ppt|xls|xlxs");
                if ($result['status'] == "success") {
                    $data = array(
                        'file_title' => $this->input->post('file_title', TRUE),
                        'enrolledto' => $this->input->post('class', TRUE),
                        'file_name' => $result['message']['filename'],
                        'file_path' => $result['message']['filepath'],
                        'full_path' => $result['message']['fullpath'],
                        'expiredat' => $this->input->post('expiredat', TRUE),
                        'createdat' => date("Y-m-d H:i:s"),
                        'createdby' => $this->sess['id'],
                        'updatedat' => date("Y-m-d H:i:s"),
                        'updatedby' => $this->sess['id'],
                    );

                    $this->Files_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('app/files'));
                }else{
                    $this->session->set_flashdata('message', 'Failed upload file');
                    redirect(site_url('app/files'));
                }
            }else{
                $this->create();
            }            
            
        }
    }
    
    public function update($id) 
    {
        $row = $this->Files_model->get_by_id($id);
        $class = $this->Classes_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('app/files/update_action'),
		'id' => set_value('id', $row->id),
		'file_title' => set_value('file_title', $row->file_title),
		'enrolledto' => set_value('enrolledto', $row->enrolledto),
		'file_name' => set_value('file_name', $row->file_name),
		'file_path' => set_value('file_path', $row->file_path),
		'full_path' => set_value('full_path', $row->full_path),    
        'expiredat' => set_value('expiredat', $row->expiredat),
		'createdby' => set_value('createdby', $row->createdby),
		'createdat' => set_value('createdat', $row->createdat),
		'updatedby' => set_value('updatedby', $row->updatedby),
		'updatedat' => set_value('updatedat', $row->updatedat),   
        'template' => 'files/files_form',   
        'extrajs' => 'files/files_extrajs',
                'extracss' => 'files/files_extracss',
                'session' => $this->sess,
                'class' => $class,
                'curfile' => $row->full_path,
            );
            $this->load->view('base/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/files'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES['file'])) {
                $result = fileuploader($_FILES, "file", "", "pdf|docx|doc|ppt|xls|xlxs");
                if ($result['status'] == "success") {
                    $data = array(
                        'file_title' => $this->input->post('file_title', TRUE),
                        'enrolledto' => $this->input->post('class', TRUE),
                        'file_name' => $result['message']['filename'],
                        'file_path' => $result['message']['filepath'],
                        'full_path' => $result['message']['fullpath'],
                        'expiredat' => $this->input->post('expiredat', TRUE),
                        'updatedat' => date("Y-m-d H:i:s"),
                        'updatedby' => $this->sess['id'],
                    );

                    unlink( $this->input->post('curfile', TRUE));

                    $this->Files_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('app/files'));
                }
                else {
                    $this->session->set_flashdata('message', 'Failed update file');
                    redirect(site_url('app/files'));
                }
            }
            else {
                $data = array(
                    'file_title' => $this->input->post('file_title', TRUE),
                    'enrolledto' => $this->input->post('class', TRUE),
                    'expiredat' => $this->input->post('expiredat', TRUE),
                    'updatedat' => date("Y-m-d H:i:s"),
                    'updatedby' => $this->sess['id'],
                );

                $this->Files_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('app/files'));
            }


            
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Files_model->get_by_id($id);

        if ($row) {
            $this->Files_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('app/files'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/files'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('file_title', 'file title', 'trim|required');
    $this->form_validation->set_rules('expiredat', 'expiredat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Files.php */
/* Location: ./application/controllers/Files.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-02-22 06:11:03 */
/* http://harviacode.com */