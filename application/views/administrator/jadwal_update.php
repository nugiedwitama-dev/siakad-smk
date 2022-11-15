<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Jadwal
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?php foreach($jadwal as $jdl) : ?>
    <?= form_open_multipart('administrator/jadwal/update_aksi'); ?>            
        <div class="form-group">
        <input type="hidden" name="id_jadwal" value="<?= $jdl->id_jadwal ?>">
        <input type="hidden" name="id_thn_ajar" value="<?= $jdl->id_thn_ajar ?>">
            <label>Nomor Induk Siswa</label>
            <input type="text" name="nis" readonly class="form-control" value="<?= $jdl->nis ?>">
            <?= form_error('nis','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <select name="kode_mapel" class="form-control">
                <option value="<?= $jdl->kode_mapel ?>"><?= $jdl->kode_mapel ?></option>
                <?php foreach ($mapel as $mp) : ?>
                    <option value="<?= $mp->kode_mp ?>">(<?= $mp->kode_mp.')'.'  &raquo;  '.'&nbsp;'.$mp->nama_mp.''?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kode_mapel', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control">
                <option value="<?= $jdl->kelas ?>"><?= $jdl->kelas ?></option>
                <?php foreach ($kelas as $kl) : ?>
                    <option value="<?= $kl->nama_kelas ?>"><?= $kl->nama_kelas ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kelas', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Hari/Jam Sesi 1</label>
            <input type="text" name="hari_jam" placeholder="Masukan Hari/Jam Sesi 1" class="form-control" value="<?= $jdl->hari_jam ?>">
            <?= form_error('hari_jam','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Hari/jam sesi 2</label>
            <input type="text" name="hari_jam2" placeholder="Masukan Hari/Jam Sesi 2" class="form-control" value="<?= $jdl->hari_jam2 ?>">
            <?= form_error('hari_jam2','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Guru/Pengajar</label>
            <select name="guru" class="form-control">
                <option value="<?= $jdl->guru ?>"><?= $jdl->guru ?></option>
                <?php foreach ($guru as $gr) : ?>
                    <option value="<?= $gr->nama_guru ?>"><?= $gr->nama_guru ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('guru', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Ruangan</label>
            <select name="ruangan" class="form-control">
                <option value="<?= $jdl->ruangan ?>"><?= $jdl->ruangan ?></option>
                <?php foreach ($ruangan as $ru) : ?>
                    <option value="<?= $ru->ruangan ?>"><?= $ru->ruangan ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('ruangan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mb-lg-5 ml-3">Submit</button>
        <br><br>
        <?php form_close(); ?>
        <?php endforeach; ?>
</div>

