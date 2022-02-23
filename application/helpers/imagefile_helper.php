<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * mapres uploader file helper
 */
if (!function_exists('imagefile')) {

    function imagefile($file, $resize_width = 275, $resize_height = 200)
    {

        $CI = & get_instance();
        $CI->load->library('image_lib');

        $config['upload_path'] = $file['filepath'];
        $config['image_library'] = 'gd';
        $config['library_path'] = '/usr/bin/';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = FALSE;
        $config['source_image'] = $file['fullpath'];
        $config['new_image'] = $file['filepath'] . "/thumb_" . $file['filename'];

        $img_size = getimagesize($config['source_image']);

        $t_ratio = $resize_width / $resize_height;
        $o_width = $img_size[0];
        $o_height = $img_size[1];
        if ($t_ratio > $o_width / $o_height) {
            $config['width'] = $resize_width;
            $config['height'] = round($resize_width * ($o_height / $o_width));
            $y_axis = round(($config['height'] / 2) - ($resize_height / 2));
            $x_axis = 0;
        }
        else {
            $config['width'] = round($resize_height * ($o_width / $o_height));
            $config['height'] = $resize_height;
            $y_axis = 0;
            $x_axis = round(($config['width'] / 2) - ($resize_width / 2));
        }

        $source_img01 = $config['new_image'];

        $CI->image_lib->clear();
        $CI->image_lib->initialize($config);
        $CI->image_lib->resize();

        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_img01;
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = false;
        $config['width'] = $resize_width;
        $config['height'] = $resize_height;
        $config['y_axis'] = $y_axis;
        $config['x_axis'] = $x_axis;

        $CI->image_lib->clear();
        $CI->image_lib->initialize($config);
        $CI->image_lib->crop();
        $CI->image_lib->clear();
        return;
    }

}