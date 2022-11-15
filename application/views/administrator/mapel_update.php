<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Mata Pelajaran
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?php foreach($mapel as $mp) : ?>
        <form method="post" action="<?= base_url('administrator/mapel/update_aksi') ?>">
            <div class="form-group">
                <input type="hidden" name="kode_mp" value="<?= $mp->kode_mp ?>">
                <label>Nama Mata Pelajaran</label>
                <input type="text" name='nama_mp' class="form-control"
                value="<?= $mp->nama_mp ?>">
                <?= form_error('nama_mp', '<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control" value="<?= $mp->semester ?>">
                <option value="">-- Pilih Semester --</option>
                <option>Ganjil</option>
                <option>Genap</option>
            </select>
            <?= form_error('semester', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" value="<?= $mp->jurusan ?>">
                <option value="">-- PIilih Jurusan --</option>
                <?php foreach ($jurusan as $jrs) : ?>
                    <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('jurusan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        </form>
    <?php endforeach; ?>

</div>