<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * mapres uploader file helper
 */
if (!function_exists('fileuploader')) {


    function fileuploader($file, $input, $prefixname = NULL, $type = 'jpg|jpeg|png|pdf') {

        $result = array();
        //initialize config
        $config['upload_path'] = 'public/uploads/' . date("Y") . "/" . date("m");
        $config['allowed_types'] = $type;
        $config['max_size'] = 5120;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $prefixname . $file[$input]['name'];
        get_instance()->upload->initialize($config);

        if (!file_exists('public/uploads/' . date("Y") . "/" . date("m"))) {
            mkdir('public/uploads/' . date("Y") . "/" . date("m"), 0755, true);
        }


        if (!empty($file[$input]['name'])) {
            if (get_instance()->upload->do_upload($input)) {
                $file = array(
                    'filename' => get_instance()->upload->data('file_name'),
                    'filepath' => $config['upload_path'],
                    'fullpath' => $config['upload_path'] . "/" . get_instance()->upload->data('file_name'),
                    'filetype' => get_instance()->upload->data('file_type'),
                );
                $result['message'] = $file;
                $result['status'] = 'success';
            } else {
                $result['status'] = 'error';
                $result['message'] = get_instance()->upload->display_errors();
                $result['file_type'] = '';
            }
        }
        return $result;
    }

}