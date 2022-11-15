
<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Siswa
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?= form_open_multipart('administrator/siswa/tambah_siswa_aksi'); ?>
    <div class="form-group">
        <label> NIS Mahasiswa</label>
        <input type="text" name='nis' class="form-control">
        <?= form_error('nis','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Nama Lengkap</label>
        <input type="text" name='nama_lengkap' class="form-control">
        <?= form_error('nama_lengkap','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Alamat</label>
        <input type="text" name='alamat' class="form-control">
        <?= form_error('alamat','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Email</label>
        <input type="text" name='email' class="form-control">
        <?= form_error('email','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Telepon</label>
        <input type="text" name='telepon' class="form-control">
        <?= form_error('telepon','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Tempat Lahir</label>
        <input type="text" name='tempat_lahir' class="form-control">
        <?= form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Tanggal Lahir</label>
        <input type="date" name='tanggal_lahir' class="form-control">
        <?= form_error('tanggal_lahir','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value=""> -- Pilih Jenis Kelamin --</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?= form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Jurusan</label>
        <select name="jurusan" class="form-control">
                <option value="">-- PIilih Jurusan --</option>
                <?php foreach ($jurusan as $jrs) : ?>
                    <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                <?php endforeach; ?>
            </select>
        <?= form_error('jurusan','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label> Kelas</label>
        <select name="kelas" class="form-control">
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $kl) : ?>
                    <option value="<?= $kl->nama_kelas ?>"><?= $kl->nama_kelas ?></option>
                <?php endforeach; ?>
            </select>
        <?= form_error('kelas','<div class="text-danger small ml-3">','</div>'); ?>
    </div>
    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" name="photo">
    </div>
    <button class="btn btn-primary mb-5 mt-4">Simpan</button>

    <?php form_close(); ?>
</div>