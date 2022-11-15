<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form  Input Jadwal
    </div>

    </script>
    <?= $this->session->flashdata('pesan')?>
    <form method="post" action="<?= base_url('administrator/jadwal/tambah_jadwal_aksi/')?>">
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <select name="id_thn_ajar" class="form-control">
                <option value="">-- Pilih Tahun Ajaran --</option>
                <?php foreach ($tahun_ajaran as $ta) : ?>
                    <option value="<?= $ta->id_thn_ajar ?>"><?= $ta->tahun_ajaran.'&nbsp;('.$ta->semester.')'.'&nbsp;('.$ta->status.')' ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('id_thn_ajar', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Nomor Induk Siswa</label>
            <input type="read_only" name="nis" placeholder="Masukan NIS Siswa" class="form-control">
            <?= form_error('nis','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Mata Pelajaran</label>
            <select name="kode_mapel" class="form-control">
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php foreach ($mapel as $mp) : ?>
                    <option value="<?= $mp->kode_mp ?>">(<?= $mp->kode_mp.')'.'  &raquo;  '.'&nbsp;'.$mp->nama_mp.''?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kode_mapel', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control">
                <option value="">-- Pilih Kelas --</option>
                <?php foreach ($kelas as $kl) : ?>
                    <option value="<?= $kl->nama_kelas ?>"><?= $kl->nama_kelas ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kelas', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Hari/Jam Sesi 1</label>
            <input type="text" name="hari_jam" placeholder="Masukan Hari/Jam Sesi 1" class="form-control">
            <?= form_error('hari_jam','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Hari/jam sesi 2</label>
            <input type="text" name="hari_jam2" placeholder="Masukan Hari/Jam Sesi 2" class="form-control">
            <?= form_error('hari_jam2','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <div class="form-group">
            <label>Guru/Pengajar</label>
            <select name="guru" class="form-control">
                <option value="">-- Pilih Guru/Pengajar --</option>
                <?php foreach ($guru as $gr) : ?>
                    <option value="<?= $gr->nama_guru ?>"><?= $gr->nama_guru ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('guru', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Ruangan</label>
            <select name="ruangan" class="form-control">
                <option value="">-- Pilih Ruangan --</option>
                <?php foreach ($ruangan as $ru) : ?>
                    <option value="<?= $ru->ruangan ?>"><?= $ru->ruangan ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('ruangan', '<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button class="btn btn-primary btn-lg mb-lg-5 ">Submit</button>
        <br><br>
         <?php form_close(); ?>
    </form>
</div>

