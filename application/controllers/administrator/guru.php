<?php

class Guru extends CI_Controller{
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

        $data['guru'] = $this->guru_model->tampil_data()->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/guru', $data);
        $this->load->view('templates_administrator/footer');  
    }
    public function tambah_guru(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_form', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_guru();
        }else{
            $data = array(
                'nip' => $this->input->post('nip', TRUE),
                'nama_guru' => $this->input->post('nama_guru', TRUE),
                'jurusan' => $this->input->post('jurusan', TRUE),
            );

            $this->guru_model->insert_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Guru berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administrator/guru');
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('nip','nip','required',[
            'required' => 'NIP wajib diisi']);
        $this->form_validation->set_rules('nama_guru','nama_guru','required',[
            'required' => 'Nama Guru wajib diisi']);
        $this->form_validation->set_rules('jurusan','hurusan','required',[
            'required' => 'Jurusan wajib diisi']);
    }
    public function update($id){
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $where = array('id' => $id);
        $data['guru'] = $this->guru_model->edit_data($where,'guru')->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/guru_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi(){

        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama_guru = $this->input->post('nama_guru');
        $jurusan = $this->input->post('jurusan');

        $data = array(
            'nip' => $nip,
            'nama_guru' => $nama_guru,
            'jurusan' => $jurusan
        );
        
        $where = array(
            'id' => $id
        );
        
        $this->guru_model->update_data($where,$data,'guru');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data guru berhasil di update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/guru');
    }
    public function delete($id){

        $where = array('id' => $id);
        $this->guru_model->hapus_data($where,'guru');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data guru berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/guru');
        
    }
}