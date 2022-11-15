<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Tahun Ajaran
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/tahun_ajaran/tambah_tahun_ajaran_aksi')?>">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" placeholder="Masukan tahun ajaran" class="form-control">
            <?= form_error('tahun_ajaran','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option value="">-- Pilih Semester --</option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?= form_error('semester','<div class="text-danger small ml-3">','</div>')?>
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">-- Pilih Status --</option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
            <?= form_error('status','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
    </form>
</div>