<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authentication extends MY_Controller {

    public $uri_to = 'app/home';
    public $sess;

    function __construct() {
        parent::__construct();
        $this->load->model('Authentication_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data = array(
            'action' => site_url('auth/authentication/login_action'),
            'forgot' => site_url('auth/authentication/reset'),
            'redirect_back' => $this->session->userdata('redirect_back'),
        );
        $this->load->view("auth/authentication/login", $data);
    }

    public function login() {
        $data = array(
            'action' => site_url('auth/authentication/login_action'),
            'forgot' => site_url('auth/authentication/reset'),
            'redirect_back' => set_value('redirect_back', $this->session->userdata('redirect_back')),
        );
        $this->load->view("authentication/login", $data);
    }

    public function login_action() {
        $this->load->model("auth/Userdetails_model");
        $this->load->model("auth/Roledetails_model");
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $username = $this->input->post('username', TRUE);
            $password = sha1($this->config->item('encryption_key') . $this->input->post('password', TRUE));

            $userlogin = $this->Authentication_model->checklogin($username, $password);
            if (!empty($userlogin)) {
                if ($userlogin->status == 0) {

                    $userdata = $this->Userdetails_model->get_by_userid($userlogin->id);
                    $rolelist = $this->Roledetails_model->get_by_roleid($userlogin->role);
                    $menu = $this->myacl->_generateMenus(json_decode($rolelist->roledetail));
                    $button = $this->myacl->_generateButtons(json_decode($rolelist->roledetail));
                    $session_data = array(
                        'id' => $userlogin->id,
                        'email' => $userlogin->email,
                        'username' => $userlogin->username,
                        'role' => $userlogin->role,
                        'rolename' => $rolelist->rolename,
                        'rolelist' => (array) json_decode($rolelist->roledetail),
                        'menus' => $menu,
                        'button' => $button,
                        'name' => $userdata->fullname,
                        'image' => $userdata->image,
                        'lastlogin' => date("Y-m-d H:i:s"),
                    );
                    $this->Authentication_model->loginstat($userlogin->id, array('status' => 1));
                    $this->session->set_userdata("logged_in", $session_data);
                    if (!empty($this->input->post('redirect_back', TRUE))) {
                        $this->uri_to = $this->input->post('redirect_back', TRUE);
                    }
                    $this->session->set_flashdata('message', 'Selamat Datang Kembali,');
                    redirect(site_url($this->uri_to));
                } elseif ($userlogin->status == 1) {
                    $userdata = $this->Userdetails_model->get_by_userid($userlogin->id);
                    $rolelist = $this->Roledetails_model->get_by_roleid($userlogin->role);
                    $menu = $this->myacl->_generateMenus(json_decode($rolelist->roledetail));
                    $session_data = array(
                        'id' => $userlogin->id,
                        'email' => $userlogin->email,
                        'username' => $userlogin->username,
                        'role' => $userlogin->role,
                        'rolename' => $rolelist->rolename,
                        'rolelist' => (array) json_decode($rolelist->roledetail),
                        'menus' => $menu,
                        'name' => $userdata->fullname,
                        'image' => $userdata->image,
                        'lastlogin' => date("Y-m-d H:i:s"),
                    );
                    $this->Authentication_model->loginstat($userlogin->id, array('status' => 1));
                    $this->session->set_userdata("logged_in", $session_data);
                    if (!empty($this->input->post('redirect_back', TRUE))) {
                        $this->uri_to = $this->input->post('redirect_back', TRUE);
                    }
                    $this->session->set_flashdata('message', 'Selamat Datang Kembali,');
                    redirect(site_url($this->uri_to));
                } else {
                    $this->session->set_flashdata('message', 'Anda sudah login di komputer lain, silahkan logout terlebih dahulu!');
                    redirect(site_url('auth/authentication'));
                }
            } else {
                $this->session->set_flashdata('message', 'Username dan Katasandi mungkin salah atau user belum aktif, silahkan hubungu administrator atau cek email');
                redirect(site_url('auth/authentication'));
            }
        }
    }

    public function logout() {
        $this->sess = $this->session->logged_in;
        $this->Authentication_model->loginstat($this->sess['id'], array('status' => 0));
        $this->session->sess_destroy();
        redirect(site_url('auth/authentication'));
    }

    public function reset($key = NULL) {
        $data = array(
            'action' => site_url('auth/authentication/reset_action'),
            'step' => 1,
            'redirect_back' => $this->session->userdata('redirect_back'),
        );
        $this->load->view("auth/authentication/reset", $data);
    }

    public function reset_action() {
        $this->load->model('auth/Users_model');
        $user = $this->Users_model->get_by_email();
        echo $this->uuid->v4();
    }

    public function _rules() {
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
