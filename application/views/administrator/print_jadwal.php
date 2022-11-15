
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> FORM MASUK HALAMAN JADWAL
    </div>
    <?= $this->session->flashdata('pesan')?>

    <form method="post" action="<?= base_url('administrator/jadwal/print') ?>">
    <div class="form-group">
        <label> NIS Siswa</label>
        <input type="text" name="nis" placeholder="Masukan NIS Siswa" class="form-control">
        <?= form_error('nis','<div class="text-danger small ml-2">','</div>') ?>
    </div>
    <div class="form-group">
        <label>Tahun Ajaran / Semester</label>
        <?php
            $query = $this->db->query('SELECT id_thn_ajar,semester, CONCAT(tahun_ajaran," -") 
                AS thn_semester 
                FROM tahun_ajaran');
            $dropdowns = $query->result();

            foreach($dropdowns as $dropdown){
                if($dropdown->semester == 'Ganjil'){
                    $tampilSemester = "Ganjil";
                }else{
                    $tampilSemester = "Genap";
                }
                $dropdownList[$dropdown->id_thn_ajar] = $dropdown 
                    ->thn_semester . " " . $tampilSemester;
            }
            echo form_dropdown('id_thn_ajar',$dropdownList,'','class="form-control" id="id_thn_ajar"');
        ?>
    </div>
    <button type="submit" class="btn btn-primary">Print</button>
    </form>
</div>