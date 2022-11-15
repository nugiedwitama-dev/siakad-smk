<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Mata Pelajaran
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/mapel/tambah_mapel_aksi') ?>">

        <div class="form-group">
            <label>Kode Mapel</label>
            <input type="text" name="kode_mp" class="form-control">
            <?= form_error('kode_mp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Nama Mapel</label>
            <input type="text" name="nama_mp" class="form-control">
            <?= form_error('nama_mp', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control">
                <option value="">-- Pilih Semester --</option>
                <option>1</option>
                <option>2</option>
            </select>
            <?= form_error('semester', '<div class="text-danger small ml-3">','</div>') ?>
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
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>