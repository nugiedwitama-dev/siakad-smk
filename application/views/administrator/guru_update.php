<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Guru
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?php foreach($guru as $g) : ?>
        <form method="post" action="<?= base_url('administrator/guru/update_aksi') ?>">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $g->id ?>">
                <label>NIP</label>
                <input type="text" readonly name='nip' class="form-control"
                value="<?= $g->nip ?>">
            </div>
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name='nama_guru' class="form-control"
                value="<?= $g->nama_guru ?>">
            </div>
            <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control">
                <option value="">-- PIilih Jurusan --</option>
                <?php foreach ($jurusan as $jrs) : ?>
                    <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('jurusan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>