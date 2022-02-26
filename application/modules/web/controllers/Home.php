<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app/Posts_model');
    }

    public function index()
    {

        $recentpost = $this->Posts_model->get_public_post($this->config->item('site_limit_post'));
        $kegiatansekolah = $this->Posts_model->get_public_post($this->config->item('site_limit_post'), "kegiatan-sekolah");
        $kegiatansiswa = $this->Posts_model->get_public_post($this->config->item('site_limit_post'), "kegiatan-siswa");
        $slider = $this->Posts_model->get_public_post($this->config->item('site_limit_post_slider'));
        $data = array(
            'template' => 'home',
            'recentpost' => $recentpost,
            'kegiatansekolah' => $kegiatansekolah,
            'kegiatansiswa' => $kegiatansiswa,
            'slider' => $slider,
        );
        $this->load->view('base/content', $data);
    }
}
