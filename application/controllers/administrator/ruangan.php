<?php

class Ruangan extends CI_Controller{

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
        $data['ruangan'] = $this->db->get('ruangan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/ruangan',$data);
        $this->load->view('templates_administrator/footer');  

    }
    public function tambah_ruangan(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/ruangan_form');
        $this->load->view('templates_administrator/footer');
    }
    public function input_aksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambah_ruangan();
        }else{
            $data = array(
                'kode_ruangan' => $this->input->post('kode_ruangan', TRUE),
                'ruangan' => $this->input->post('ruangan', TRUE),
            );

            $this->ruangan_model->insert_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Ruangan berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administrator/ruangan');
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('kode_ruangan','kode_ruangan','required',[
            'required' => 'Kode Ruangan wajib diisi']);
        $this->form_validation->set_rules('ruangan','ruangan','required',[
            'required' => 'Nama Ruangan wajib diisi']);
    }
    public function update($id){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $where = array('id_ruangan' => $id);
        $data['ruangan'] = $this->ruangan_model->edit_data($where,'ruangan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/ruangan_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi(){

        $id = $this->input->post('id_ruangan');
        $kode_ruangan = $this->input->post('kode_ruangan');
        $ruangan = $this->input->post('ruangan');

        $data = array(
            'kode_ruangan' => $kode_ruangan,
            'ruangan' => $ruangan,
        );
        
        $where = array(
            'id_ruangan' => $id
        );
        
        $this->ruangan_model->update_data($where,$data,'ruangan');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data ruangan berhasil di update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/ruangan');
    }
    public function delete($id){

        $where = array('id_ruangan' => $id);
        $this->ruangan_model->hapus_data($where,'ruangan');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data ruangan berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/ruangan');
        
    }
}