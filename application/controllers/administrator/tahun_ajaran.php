<?php

class Tahun_ajaran extends CI_Controller {

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
        $data['tahun_ajaran'] = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/tahun_ajaran', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_tahun_ajaran(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/tahun_ajaran_form');
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_tahun_ajaran_aksi(){

        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambah_tahun_ajaran();
        }else{
            $tahun_ajaran = $this->input->post('tahun_ajaran');
            $semester = $this->input->post('semester');
            $status = $this->input->post('status');
    
            $data = array(
                'tahun_ajaran' => $tahun_ajaran,
                'semester' => $semester,
                'status' => $status,
            );

            $this->tahun_ajaran_model->insert_data($data,'tahun_ajaran');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data tahun ajaran berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('administrator/tahun_ajaran');
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('tahun_ajaran','tahun ajaran','required',[
            'required' => 'Tahun Ajaran wajib diisi']);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'Semester wajib diisi']);
        $this->form_validation->set_rules('status','status','required',[
            'required' => 'Status wajib diisi']);
    }
    public function update($id){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $where = array('id_thn_ajar' => $id);
        $data['tahun_ajaran'] = $this->tahun_ajaran_model->edit_data($where,'tahun_ajaran')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/tahun_ajaran_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi(){
        $this->_rules();
        $id = $this->input->post('id_thn_ajar');
        if($this->form_validation->run() == FALSE){
            $this->update($id);
        }else{
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $semester = $this->input->post('semester');
        $status = $this->input->post('status');

        $data = array(
            'tahun_ajaran' => $tahun_ajaran,
            'semester' => $semester,
            'status' => $status
        );
        
        $where = array(
            'id_thn_ajar' => $id
        );
        
        $this->tahun_ajaran_model->update_data($where,$data,'tahun_ajaran');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data tahun ajaran berhasil di update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/tahun_ajaran');
        }
    }
    public function delete($id){

        $where = array('id_thn_ajar' => $id);
        $this->tahun_ajaran_model->hapus_data($where,'tahun_ajaran');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data tahun ajaran berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/tahun_ajaran');
        
    }
}