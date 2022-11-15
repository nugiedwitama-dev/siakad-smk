<?php

class Kelas extends CI_Controller {
    
    function __construct(){
        parent::__construct();

        if(!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf !!!</strong> Anda harus login !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administrator/auth');
        }
    }


    public function index(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input(){

        $data = array(
            'id' => set_value('id'),
            'kode_kelas' => set_value('kode_kelas'),
            'nama_kelas' => set_value('nama_kelas'),
            'jurusan' => set_value('jurusan')
        );
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/kelas_form', $data);
        $this->load->view('templates_administrator/footer');
    }
}