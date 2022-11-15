<?php

class Mapel extends CI_Controller{

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
        $data['mapel'] = $this->mapel_model->tampil_data('mapel')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/mapel', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_mapel(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['jurusan'] = $this->mapel_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/mapel_form', $data);
        $this->load->view('templates_administrator/footer');

    }
    public function tambah_mapel_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_mapel();
        }else{
            $kode_mp = $this->input->post('kode_mp', TRUE);
            $nama_mp = $this->input->post('nama_mp', TRUE);
            $semester = $this->input->post('semester', TRUE);
            $jurusan = $this->input->post('jurusan', TRUE);

            $data = array(
                'kode_mp' => $kode_mp,
                'nama_mp' => $nama_mp,
                'semester' => $semester,
                'jurusan' => $jurusan
            );

            $this->mapel_model->insert_data($data,'mapel');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data mata pelajaran berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
                  
            redirect('administrator/mapel');
        }
    }
    public function _rules(){

        $this->form_validation->set_rules('kode_mp','kode_mp','required',[
            'required' => 'Kode mata pelajaran wajib diisi']);
        $this->form_validation->set_rules('nama_mp','nama_mp','required',[
            'required' => 'Nama mata pelajaran wajib diisi']);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'Semester wajib diisi']);
        $this->form_validation->set_rules('jurusan','jurusan','required',[
            'required' => 'Jurusan wajib diisi']);

    }
    public function detail($kode){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['detail'] = $this->mapel_model->ambil_kode_mp($kode);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/mapel_detail', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update($id){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $where = array('kode_mp' => $id);
        $data['mapel'] = $this->mapel_model->edit_data($where,'mapel')->result();
        $data['jurusan'] = $this->db->query("select * from jurusan")->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/mapel_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi(){
        $this->_rules2();
        $id = $this->input->post('kode_mp');
        if($this->form_validation->run() == FALSE){
            $this->update($id);
        }else{
        $nama_mp = $this->input->post('nama_mp');
        $semester = $this->input->post('semester');
        $jurusan = $this->input->post('jurusan');

        $data = array(
            'nama_mp' => $nama_mp,
            'semester' => $semester,
            'jurusan' => $jurusan
        );
        
        $where = array(
            'kode_mp' => $id
        );
        
        $this->mapel_model->update_data($where,$data,'mapel');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data mata pelajaran berhasil di update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/mapel');
        }
    }
    public function delete($id){

        $where = array('kode_mp' => $id);
        $this->jurusan_model->hapus_data($where,'mapel');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data mapel berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/mapel');
        
    }
    public function _rules2(){

        $this->form_validation->set_rules('kode_mp','kode_mp','required',[
            'required' => 'Kode mata pelajaran wajib diisi']);
        $this->form_validation->set_rules('nama_mp','nama_mp','required',[
            'required' => 'Nama mata pelajaran wajib diisi']);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'Semester wajib diisi']);
        $this->form_validation->set_rules('jurusan','jurusan','required',[
            'required' => 'Jurusan wajib diisi']);

    }

}