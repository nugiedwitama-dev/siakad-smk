<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Ruangan
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/ruangan/input_aksi')?>">
        <div class="form-group">
            <label>Kode Ruangan</label>
            <input type="text" name="kode_ruangan" placeholder="Masukan Kode Ruangan" class="form-control">
            <?= form_error('kode_ruangan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Ruangan</label>
            <input type="text" name="ruangan" placeholder="Masukan nama ruangan" class="form-control">
            <?= form_error('ruangan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
    </form>
</div>