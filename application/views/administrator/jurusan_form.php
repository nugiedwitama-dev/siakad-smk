<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Jurusan
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/jurusan/input_aksi')?>">
        <div class="form-group mb-5">
            <label>Kode Jurusan</label>
            <input type="text" name="kode_jurusan" placeholder="Masukan kode jurusan" class="form-control">
            <?= form_error('kode_jurusan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" placeholder="Masukan nama jurusan" class="form-control">
            <?= form_error('nama_jurusan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
    </form>
</div>