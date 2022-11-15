<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Update Siswa
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?php foreach($siswa as $sis) : ?>
    <?= form_open_multipart('administrator/siswa/update_siswa_aksi'); ?>

    <div class="form-group">
        <label> NIS Mahasiswa</label>
        <input type="hidden" name='id' class="form-control" value="<?= $sis->id ?>">
        <input type="text" name='nis' class="form-control" value="<?= $sis->nis ?>">
        <?= form_error('nis','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> No Kartu</label>
        <input type="text" name='nokartu' class="form-control" value="<?= $sis->nokartu ?>">
        <?= form_error('nokartu','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Nama Lengkap</label>
        <input type="text" name='nama_lengkap' class="form-control" value="<?= $sis->nama_lengkap ?>">
        <?= form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Alamat</label>
        <input type="text" name='alamat' class="form-control" value="<?= $sis->alamat ?>">
        <?= form_error('alamat','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Email</label>
        <input type="text" name='email' class="form-control" value="<?= $sis->email ?>">
        <?= form_error('email','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Telepon</label>
        <input type="text" name='telepon' class="form-control" value="<?= $sis->telepon ?>">
        <?= form_error('telepon','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Tempat Lahir</label>
        <input type="text" name='tempat_lahir' class="form-control" value="<?= $sis->tempat_lahir ?>">
        <?= form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Tanggal Lahir</label>
        <input type="date" name='tanggal_lahir' class="form-control" value="<?= $sis->tanggal_lahir ?>">
        <?= form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" value="<?= $sis->jenis_kelamin?>">
            <option value="">--Pilih Jenis Kelamin</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?= form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Jurusan</label>
        <select name="jurusan" class="form-control" value="<?= $sis->jurusan ?>">
                <option value="">--Pilih Jurusan</option>
                <?php foreach ($jurusan as $jrs) : ?>
                    <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                <?php endforeach; ?>
            </select>
        <?= form_error('jurusan','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Kelas</label>
        <select name="kelas" class="form-control" value="<?= $sis->kelas?>">
                <option value="">--Pilih Kelas</option>
                <?php foreach ($kelas as $kl) : ?>
                    <option value="<?= $kl->nama_kelas ?>"><?= $kl->nama_kelas ?></option>
                <?php endforeach; ?>
            </select>
        <?= form_error('kelas','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <?php foreach($detail as $dt) : ?>
            <img src="<?= base_url().'assets/uploads/'.$sis->photo ?>" width="200" height="200">
        <?php endforeach; ?>
        <br> <br>
        <label>Foto</label><br><br>
        <input type="file" name="userfile" value="<?= $sis->photo ?>">
    </div>
    <button class="btn btn-primary mb-5 mt-4">Simpan</button>

    <?php form_close(); ?>
    <?php endforeach; ?>
</div>