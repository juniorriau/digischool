<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends MY_Controller {

    public $type;
    public $sess;
    public $filename = '';

    function __construct() {
        parent::__construct();
        parent::_auth($this->uri->uri_string());
        $this->load->model('Posts_model');
        $this->load->model('Media_model');
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
        $this->type = $this->uri->segment(2);
        $this->sess = $this->session->logged_in;
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'app/posts/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'app/posts/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'app/posts/index';
            $config['first_url'] = base_url() . 'app/posts/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Posts_model->total_rows($q, $this->type);
        $posts = $this->Posts_model->get_limit_data($config['per_page'], $start, $q, $this->type);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'posts_data' => $posts,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'template' => 'posts/posts_list',
            'session' => $this->sess,
            'uri' => $this->type,
        );
        $this->load->view('base/content', $data);
    }

    public function read($id) {
        $row = $this->Posts_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'guuid' => $row->guuid,
                'title' => $row->title,
                'content' => $row->content,
                'postimage' => $row->postimage,
                'type' => $row->type,
                'metapost' => $row->metapost,
                'keywords' => $row->keywords,
                'createdat' => $row->createdat,
                'createdby' => $row->createdby,
            );
            $this->load->view('posts/posts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/posts'));
        }
    }

    public function create() {
        $category=$this->Categories_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('app/posts/create_action'),
            'id' => set_value('id'),
            'title' => set_value('title'),
            'content' => set_value('content'),
            'categoryid' => set_value('categoryid'),
            'postimage' => set_value('postimage'),
            'metapost' => set_value('metapost'),
            'keywords' => set_value('keywords'),
            'poststatus' => set_value('poststatus'),
            'commentstatus' => set_value('commentstatus'),
            'template' => 'posts/posts_form',
            'extrajs' => 'posts/posts_extrajs',
            'session' => $this->sess,
            'category' => $category,
        );
        $this->load->view('base/content', $data);
    }

    public function create_action() {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            if (!empty($_FILES['postimage'])) {
                $result = fileuploader($_FILES, "postimage", "", "gif|jpg|jpeg|png|");
                if ($result['status'] == "success") {
                    $this->load->helper('imagefile');
                    imagefile($result['message']);
                    $data = array(
                        'filename' => $result['message']['filename'],
                        'filepath' => $result['message']['filepath'],
                        'fullpath' => $result['message']['fullpath'],
                        'filetype' => $result['message']['filetype'],
                        'createdat' => date("Y-m-d H:i:s"),
                        'createdby' => $this->sess['id'],
                        'updatedat' => date("Y-m-d H:i:s"),
                        'updatedby' => $this->sess['id'],
                    );
                    $this->Media_model->insert($data);
                    $this->filename = $result['message']['fullpath'];
                }
                $data = array(
                    'guuid' => $this->uuid->v4(),
                    'title' => $this->input->post('title', TRUE),
                    'slug' => url_title($this->input->post('title', TRUE), "-", TRUE),
                    'content' => $this->input->post('content', FALSE),
                    'categoryid' => $this->input->post('categoryid', TRUE),
                    'postimage' => $this->filename,
                    'type' => $this->input->post('type', TRUE),
                    'metapost' => $this->input->post('metapost', TRUE),
                    'keywords' => $this->input->post('keywords', TRUE),
                    'poststatus' => $this->input->post('poststatus', TRUE),
                    'commentstatus' => $this->input->post('commentstatus', TRUE),
                    'createdat' => date("Y-m-d H:i:s"),
                    'createdby' => $this->sess['id'],
                    'updatedat' => date("Y-m-d H:i:s"),
                    'updatedby' => $this->sess['id'],
                );
                $this->Posts_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('app/posts'));
            }
            
        }
    }

    public function update($id) {
        $row = $this->Posts_model->get_by_id($id);
        $category=$this->Categories_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('app/posts/update_action'),
                'id' => set_value('id', $row->id),
                'guuid' => set_value('guuid', $row->guuid),
                'title' => set_value('title', $row->title),
                'content' => set_value('content', $row->content),
                'categoryid' => set_value('categoryid', $row->categoryid),
                'postimage' => set_value('postimage', $row->postimage),
                'type' => set_value('type', $row->type),
                'metapost' => set_value('metapost', $row->metapost),
                'keywords' => set_value('keywords', $row->keywords),
                'poststatus' => set_value('poststatus', $row->poststatus),
                'commentstatus' => set_value('commentstatus',$row->commentstatus),
                'template' => 'posts/posts_form',
                'extrajs' => 'posts/posts_extrajs',
                'session' => $this->sess,
                'category'=>$category,
            );
            $this->load->view('base/content', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/posts'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $this->filename = $this->input->post('currentimage', TRUE);
            if (!empty($_FILES['postimage'])) {

                $result = fileuploader($_FILES, "postimage", "", "gif|jpg|jpeg|png|");
                if ($result['status'] == "success") {
                    $this->load->helper('imagefile');
                    imagefile($result['message']);
                    $data = array(
                        'filename' => $result['message']['filename'],
                        'filepath' => $result['message']['filepath'],
                        'fullpath' => $result['message']['fullpath'],
                        'filetype' => $result['message']['filetype'],
                        'createdat' => date("Y-m-d H:i:s"),
                        'createdby' => $this->sess['id'],
                        'updatedat' => date("Y-m-d H:i:s"),
                        'updatedby' => $this->sess['id'],
                    );
                    $this->Media_model->insert($data);
                    $this->filename=$result['message']['fullpath'];
                }
                $data = array(
                    'title' => $this->input->post('title', TRUE),
                    'slug' => url_title($this->input->post('title', TRUE), "-", TRUE),
                    'content' => $this->input->post('content', FALSE),
                    'categoryid' => $this->input->post('categoryid', TRUE),
                    'postimage' => $this->filename,
                    'type' => $this->input->post('type', TRUE),
                    'metapost' => $this->input->post('metapost', TRUE),
                    'keywords' => $this->input->post('keywords', TRUE),
                    'poststatus' => $this->input->post('poststatus', TRUE),
                    'commentstatus' => $this->input->post('commentstatus', TRUE),
                    'updatedat' => date("Y-m-d H:i:s"),
                    'updatedby' => $this->sess['id'],
                );

                $this->Posts_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('app/posts'));
            }
            
        }
    }

    public function delete($id) {
        $row = $this->Posts_model->get_by_id($id);

        if ($row) {
            $this->Posts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('app/posts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('app/posts'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('content', 'content', 'trim|required');
        $this->form_validation->set_rules('metapost', 'metapost', 'trim|required');
        $this->form_validation->set_rules('keywords', 'keywords', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Posts.php */
/* Location: ./application/controllers/Posts.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-21 12:45:37 */
/* http://harviacode.com */
