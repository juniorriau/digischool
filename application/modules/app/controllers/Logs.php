<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logs extends MY_Controller {

    function __construct() {
        parent::__construct();
        parent::_auth($this->uri->uri_string());
        $this->load->model('Logs_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'app/logs/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'app/logs/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'app/logs/index.html';
            $config['first_url'] = base_url() . 'app/logs/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Logs_model->total_rows($q);
        $logs = $this->Logs_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'logs_data' => $logs,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('logs/logs_list', $data);
    }

    public function read($id) {
        $row = $this->Logs_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'userid' => $row->userid,
                'ipaddress' => $row->ipaddress,
                'date' => $row->date,
                'referer' => $row->referer,
            );
            $this->load->view('logs/logs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/logs'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('app/logs/create_action'),
            'id' => set_value('id'),
            'userid' => set_value('userid'),
            'ipaddress' => set_value('ipaddress'),
            'date' => set_value('date'),
            'referer' => set_value('referer'),
        );
        $this->load->view('logs/logs_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id' => $this->input->post('id', TRUE),
                'userid' => $this->input->post('userid', TRUE),
                'ipaddress' => $this->input->post('ipaddress', TRUE),
                'date' => $this->input->post('date', TRUE),
                'referer' => $this->input->post('referer', TRUE),
            );

            $this->Logs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('app/logs'));
        }
    }

    public function update($id) {
        $row = $this->Logs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('app/logs/update_action'),
                'id' => set_value('id', $row->id),
                'userid' => set_value('userid', $row->userid),
                'ipaddress' => set_value('ipaddress', $row->ipaddress),
                'date' => set_value('date', $row->date),
                'referer' => set_value('referer', $row->referer),
            );
            $this->load->view('logs/logs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/logs'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'id' => $this->input->post('id', TRUE),
                'userid' => $this->input->post('userid', TRUE),
                'ipaddress' => $this->input->post('ipaddress', TRUE),
                'date' => $this->input->post('date', TRUE),
                'referer' => $this->input->post('referer', TRUE),
            );

            $this->Logs_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('app/logs'));
        }
    }

    public function delete($id) {
        $row = $this->Logs_model->get_by_id($id);

        if ($row) {
            $this->Logs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('app/logs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/logs'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('userid', 'userid', 'trim|required');
        $this->form_validation->set_rules('ipaddress', 'ipaddress', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('referer', 'referer', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Logs.php */
/* Location: ./application/controllers/Logs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-21 12:45:37 */
/* http://harviacode.com */