<?php

class Comments extends MY_Controller
{

    public function _rules()
    {
        $this->form_validation->set_rules('postid', 'postid', 'trim|required');
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');
        $this->form_validation->set_rules('authorname', 'authorname', 'trim|required');
        $this->form_validation->set_rules('authoremail', 'authoremail', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}