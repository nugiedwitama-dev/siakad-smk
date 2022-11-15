<?php

class Siswa extends CI_Controller{

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
        $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/siswa', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function detail($id){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/siswa_detail', $data);
        $this->load->view('templates_administrator/footer');     
    }
    public function tambah_siswa(){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['kelas'] = $this->db->query("select * from kelas")->result();
        $data['jurusan'] = $this->siswa_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/siswa_form', $data);
        $this->load->view('templates_administrator/footer');   

        
    }
    public function tambah_siswa_aksi(){

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambah_siswa();
        }else{
            $nis = $this->input->post('nis');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kelas');
            $photo = $_FILES['photo'];
            if ($photo=''){}else{
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'gif|jpg|png|jfif|tiff';
                
                $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('photo')){
                   echo "Gagal Upload"; die();
                }
                else{
                    $photo = $this->upload->data('file_name');
                }
                
                $data = array(
                    'nis' => $nis,
                    'nama_lengkap' => $nama_lengkap,
                    'alamat' => $alamat,
                    'email' => $email,
                    'telepon' => $telepon,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'jurusan' => $jurusan,
                    'kelas' => $kelas,
                    'photo' => $photo,
                );
                $this->siswa_model->insert_data($data,'siswa');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data siswa berhasil di tambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                  
            redirect('administrator/siswa');

            }
        }
    }
    public function update($id){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $data['siswa'] = $this->db->query("select * from siswa sis where sis.id='$id'")->result();
        $data['jurusan'] = $this->siswa_model->tampil_data('jurusan'
            )->result();
        $data['kelas'] = $this->db->query("select * from kelas")->result();
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/siswa_update', $data);
        $this->load->view('templates_administrator/footer');  

    }
    public function update_siswa_aksi(){
        $id = $this->input->post('id');
        $this->_rules2();
        if($this->form_validation->run() == FALSE){
            $this->update($id);
        }else{
            $nis = $this->input->post('nis');
            $nokartu = $this->input->post('nokartu');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jurusan = $this->input->post('jurusan');
            $kelas = $this->input->post('kelas');
            $photo = $_FILES['userfile']['name'];
            if ($photo){
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'gif|jpg|png|jfif|tiff';
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('userfile')){
                   $userfile = $this->upload->data('file_name');
                   $this->db->set('photo',$userfile);
                }
                else{
                    echo "Gagal Upload";
                }
            }
            $data = array(
                'nis' => $nis,
                'nokartu' => $nokartu,
                'nama_lengkap' => $nama_lengkap,
                'alamat' => $alamat,
                'email' => $email,
                'telepon' => $telepon,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'jurusan' => $jurusan,
                'kelas' => $kelas,        
            );

            $where = array(
                'id' => $id
            );
            $this->siswa_model->update_data($where,$data,'siswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data siswa berhasil di update
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
              
        redirect('administrator/siswa');
        }
    }
    public function delete($id){

        $where = array('id' => $id);
        $this->siswa_model->hapus_data($where,'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data siswa berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/siswa');
        
    }
    public function _rules(){

        $this->form_validation->set_rules('nis','Nis','required',[
            'required' => 'NIS wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required',[
            'required' => 'Nama Lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required',[
            'required' => 'Alamat wajib diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',[
            'required' => ' Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('telepon','Telepon','required',[
            'required' => 'Telepon wajib diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',[
            'required' => 'Tempat Lahir wajib diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',[
            'required' => 'Tanggal Lahir wajib diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
            'required' => 'Jenis Kelamin wajib diisi!'
        ]);
        $this->form_validation->set_rules('jurusan','Jurusan','required',[
            'required' => 'Jurusan wajib diisi!'
        ]);
        $this->form_validation->set_rules('kelas','Kelas','required',[
            'required' => 'Kelas wajib diisi!'
        ]);

    }
    public function _rules2(){

        $this->form_validation->set_rules('nis','Nis','required',[
            'required' => 'NIS wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required',[
            'required' => 'Nama Lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required',[
            'required' => 'Alamat wajib diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',[
            'required' => ' Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('telepon','Telepon','required',[
            'required' => 'Telepon wajib diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',[
            'required' => 'Tempat Lahir wajib diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',[
            'required' => 'Tanggal Lahir wajib diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required',[
            'required' => 'Jenis Kelamin wajib diisi!'
        ]);
        $this->form_validation->set_rules('jurusan','Jurusan','required',[
            'required' => 'Jurusan wajib diisi!'
        ]);
        $this->form_validation->set_rules('kelas','Kelas','required',[
            'required' => 'Kelas wajib diisi!'
        ]);
       // $this->form_validation->set_rules('photo','photo','required',['required' => 'Foto Wjib Di Isi']);

    }

}