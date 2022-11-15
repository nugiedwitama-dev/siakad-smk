<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Update Tahun Ajaran
    </div>
    <?= $this->session->flashdata('pesan')?>

    <?php foreach($tahun_ajaran as $ta) : ?>
    <form method="post" action="<?= base_url('administrator/tahun_ajaran/update_aksi')?>">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <input type="hidden" name="id_thn_ajar" placeholder="Masukan tahun ajaran" class="form-control" value="<?= $ta->id_thn_ajar ?>">
            <input type="text" name="tahun_ajaran" class="form-control" value="<?= $ta->tahun_ajaran ?>">
            <?= form_error('tahun_ajaran','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option><?= $ta->semester ?></option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?= form_error('semester','<div class="text-danger small ml-3">','</div>')?>
        </div>
        
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value=""><?= $ta->status ?></option>
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
            <?= form_error('status','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
    </form>
    <?php endforeach; ?>
</div>