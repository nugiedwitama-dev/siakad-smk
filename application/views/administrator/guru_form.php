<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Guru
    </div>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/guru/input_aksi')?>">
        <div class="form-group">
            <label>NIP</label>
            <input type="text" name="nip" placeholder="Masukan NIP Guru" class="form-control">
            <?= form_error('nip','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Nama Guru</label>
            <input type="text" name="nama_guru" placeholder="Masukan nama jurusan" class="form-control">
            <?= form_error('nama_guru','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j->nama_jurusan ?>">(<?= $j->kode_jurusan.')'.'  &raquo;  '.'&nbsp;'.$j->nama_jurusan.''?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kode_mapel', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
    </form>
</div>