<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Jurusan
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?php foreach($jurusan as $jrs) : ?>
        <form method="post" action="<?= base_url('administrator/jurusan/update_aksi') ?>">
            <div class="form-group">
                <input type="hidden" name="id_jurusan" value="<?= $jrs->id_jurusan ?>">
                <label>Kode Jurusan</label>
                <input type="text" name='kode_jurusan' class="form-control"
                value="<?= $jrs->kode_jurusan ?>">
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name='nama_jurusan' class="form-control"
                value="<?= $jrs->nama_jurusan ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>