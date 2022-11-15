<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Guru
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/ruangan/update_aksi')?>">
    <?php foreach ($ruangan as $r) : ?>
        <div class="form-group">
            <label>Kode Ruangan</label>
            <input type="hidden" name="id_ruangan" id="" value="<?= $r->id_ruangan ?>">
            
            <input type="text" name="kode_ruangan" placeholder="Masukan Kode Ruangan" class="form-control" value="<?= $r->kode_ruangan ?>">
            
            <?= form_error('kode_ruangan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Ruangan</label>
           
            <input type="text" name="ruangan" placeholder="Masukan nama ruangan" class="form-control" value="<?= $r->ruangan ?>">
            
            <?= form_error('ruangan','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
        <?php endforeach; ?>
    </form>
</div>