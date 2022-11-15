<?php 

class Jadwal extends CI_Controller{
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
        
        $data = array (
            'nis'  => set_value('nis'),
            'id_thn_ajar' => set_value('id_thn_ajar')
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
        $this->load->view('administrator/masuk_jadwal', $data);
        $this->load->view('templates_administrator/footer');        
    }
    public function masuk_jadwal_aksi(){

        $this->_rulesJadwal();
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $nis = $this->input->post('nis', TRUE);
            $thn_ajar = $this->input->post('id_thn_ajar', TRUE);
        }
        if ($this->siswa_model->get_by_id($nis) == null){
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data Siswa yang anda input belum terdaftar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/jadwal');
        } else{
        $dataJadwal = array(
            'jadwal_data' => $this->baca_jadwal($nis,$thn_ajar),
            'nis' => $nis,
            'id_thn_ajar' => $thn_ajar,
            'thn_ajar' => $this->tahun_ajaran_model->get_by_id($thn_ajar)->tahun_ajaran,
            'semester' => $this->tahun_ajaran_model->get_by_id($thn_ajar)->semester==1?'Genap':'Ganjil',
            'nama_lengkap' => $this->siswa_model->get_by_id($nis)->nama_lengkap,
            'jurusan' => $this->siswa_model->get_by_id($nis)->jurusan,
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
        $this->load->view('administrator/jadwal', $dataJadwal);
        $this->load->view('templates_administrator/footer');      
        }  
    }
    public function baca_jadwal($nis,$thn_ajar){
        $this->db->select('j.id_jadwal, j.kode_mapel, j.kelas, j.hari_jam, j.hari_jam2, j.ruangan,j.guru, j.semester,m.nama_mp');
        $this->db->from(' jadwal as j');
        $this->db->where('j.nis', $nis);
        $this->db->where('j.id_thn_ajar', $thn_ajar);
        $this->db->join('mapel as m', 'm.kode_mp = j.kode_mapel');


        $jadwal = $this->db->get()->result();
        return $jadwal;
    }
    public function _rulesJadwal(){
        $this->form_validation->set_rules('nis','nis','required');
        $this->form_validation->set_rules('id_thn_ajar','id_thn_ajar','required');
    }
    public function tambah_jadwal(){
        $data['tahun_ajaran'] = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();
        $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
        $data['mapel'] =$this->mapel_model->tampil_data('mapel')->result();
        $data['guru'] = $this->guru_model->tampil_data('guru')->result();
        $data['ruangan'] = $this->ruangan_model->tampil_data('ruangan')->result();
        $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
        $ise = $this->user_model->ambil_data($this->session->userdata['username']);
        $ise = array(
            'username' => $ise->username,
            'nama_user' => $ise->nama_user,
            'photo' => $ise->photo,
            'level' => $ise->level,
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$ise);
        $this->load->view('administrator/jadwal_form',$data);
        $this->load->view('templates_administrator/footer'); 
    }
    public function tambah_jadwal_aksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
             $this->tambah_jadwal();
        }else{
            $id_thn_ajar = $this->input->post('id_thn_ajar', TRUE);
            $nis = $this->input->post('nis', TRUE);
            $kode_mapel = $this->input->post('kode_mapel', TRUE);
            $kelas = $this->input->post('kelas', TRUE);
            $hari_jam = $this->input->post('hari_jam', TRUE);
            $hari_jam2 = $this->input->post('hari_jam2', TRUE);
            $guru = $this->input->post('guru', TRUE);
            $ruangan = $this->input->post('ruangan', TRUE);

            $data = array(
                'id_thn_ajar' => $id_thn_ajar,
                'nis' => $nis,
                'kode_mapel' => $kode_mapel,
                'kelas' => $kelas,
                'hari_jam' => $hari_jam,
                'hari_jam2' => $hari_jam2,
                'guru' => $guru,
                'ruangan' => $ruangan,

            );
            $this->jadwal_model->insert_data($data,'jadwal');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data jadwal berhasil di tambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                      
            redirect('administrator/jadwal');
        }
    }
    public function _rules(){

        $this->form_validation->set_rules('id_thn_ajar','id_thn_ajar','required',[
            'required' => 'id tahun ajaran wajib diisi']);
        $this->form_validation->set_rules('nis','nis','required',[
            'required' => 'nomor induk siswa wajib diisi']);
        $this->form_validation->set_rules('kode_mapel','kode_mapel','required',[
            'required' => 'mata pelajaran wajib diisi']);
        $this->form_validation->set_rules('kelas','kelas','required',[
            'required' => 'kelas wajib diisi']);
        $this->form_validation->set_rules('hari_jam','hari_jam','required',[
            'required' => 'hari/jam sesi 1 wajib diisi']);
        $this->form_validation->set_rules('hari_jam2','hari_jam2','required',[
            'required' => 'hari/jam sesi 2 wajib diisi']);
        $this->form_validation->set_rules('guru','guru','required',[
            'required' => 'guru wajib diisi']);
        $this->form_validation->set_rules('ruangan','ruangan','required',[
            'required' => 'ruangan wajib diisi']);

    }
    public function update($id_jadwal){

        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'nama_user' => $data->nama_user,
            'photo' => $data->photo,
            'level' => $data->level,
        );
        $where = array('id_jadwal' => $id_jadwal);
        $data['jadwal'] = $this->jadwal_model->edit_data($where,'jadwal')->result();
        $data['mapel'] = $this->mapel_model->tampil_data('mapel')->result();
        $data['tahun_ajaran'] = $this->tahun_ajaran_model->tampil_data('tahun_ajaran')->result();
        $data['kelas'] = $this->kelas_model->tampil_data('kelas')->result();
        $data['guru'] = $this->guru_model->tampil_data('guru')->result();
        $data['ruangan'] = $this->ruangan_model->tampil_data('ruangan')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/jadwal_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi(){

        $id_jadwal = $this->input->post('id_jadwal');
        $id_thn_ajar = $this->input->post('id_thn_ajar');
        $nis = $this->input->post('nis');
        $kode_mapel = $this->input->post('kode_mapel');
        $kelas = $this->input->post('kelas');
        $hari_jam = $this->input->post('hari_jam');
        $hari_jam2 = $this->input->post('hari_jam2');
        $guru = $this->input->post('guru');
        $ruangan = $this->input->post('ruangan');
        $semester = $this->input->post('semester');

        $data = array(
            'id_thn_ajar' => $id_thn_ajar,
            'nis' => $nis,
            'kode_mapel' => $kode_mapel,
            'kelas' => $kelas,
            'hari_jam' => $hari_jam,
            'hari_jam2' => $hari_jam2,
            'guru' => $guru,
            'ruangan' => $ruangan,
            'semester' => $semester
        );
        
        $where = array(
            'id_jadwal' => $id_jadwal,
        );
        
        $this->jadwal_model->update_data($where,$data,'jadwal');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data jadwal berhasil di update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/jadwal');
    }
    public function delete($id_jadwal){

        $where = array('id_jadwal' => $id_jadwal);
        $this->jadwal_model->hapus_data($where,'jadwal');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Jadwal berhasil di hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/jadwal');
    }
    public function print_jadwal(){
        $side = $this->user_model->ambil_data($this->session->userdata['username']);
        $side = array(
            'username' => $side->username,
            'nama_user' => $side->nama_user,
            'photo' => $side->photo,
            'level' => $side->level,
        );
        $data = array (
            'nis'  => set_value('nis'),
            'id_thn_ajar' => set_value('id_thn_ajar')
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar',$side);
        $this->load->view('administrator/print_jadwal', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function print(){
       // $this->load->library('dompdf_gen');
        $this->_rulesJadwal();
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $nis = $this->input->post('nis', TRUE);
            $thn_ajar = $this->input->post('id_thn_ajar', TRUE);
        }
        if ($this->siswa_model->get_by_id($nis) == null){
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data Siswa yang anda input belum terdaftar
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/print_jadwal');
        } else{
        $dataJadwal = array(
            'jadwal_data' => $this->baca_jadwal($nis,$thn_ajar),
            'nis' => $nis,
            'id_thn_ajar' => $thn_ajar,
            'thn_ajar' => $this->tahun_ajaran_model->get_by_id($thn_ajar)->tahun_ajaran,
            'semester' => $this->tahun_ajaran_model->get_by_id($thn_ajar)->semester==1?'Genap':'Ganjil',
            'nama_lengkap' => $this->siswa_model->get_by_id($nis)->nama_lengkap,
            'jurusan' => $this->siswa_model->get_by_id($nis)->jurusan,
        );

        $this->load->view('administrator/export_pdf', $dataJadwal);
 
        
      //  $paper_size = 'A4';
      //  $orientation = 'landscape';
      //  $html = $this->output->get_output();
      //  $this->dompdf->set_paper($paper_size,$orientation);
//
      //  $this->dompdf->render($html);
      //  $this->dompdf->render();
      //  $this->dompdf->stream("jadwal_".$nis.".pdf");
       }  
    }

}