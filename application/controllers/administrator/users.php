<?php

class Users extends CI_Controller{

    public function index(){
        $data['users'] = $this->user_model->tampil_data('users')->result();
    }
}