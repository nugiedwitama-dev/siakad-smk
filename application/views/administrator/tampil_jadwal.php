<div class="container-fluid">
    <div class="alert alert-success" role="alert"><i class="fas fa-university"></i> JADWAL</div>
    <?= $this->session->flashdata('pesan')?>
    <center class="mb-3"> <legend class="mt-3"> <strong>JADWAL</strong></legend>
    <table class="mt-3">
        <tr><td><strong>NIS</strong></td><td>&nbsp;: <?= $nis ?></td></tr>
        <tr><td><strong>Nama Lengkap</strong></td><td>&nbsp;: <?= $nama_lengkap ?></td></tr>
        <tr><td><strong>Jurusan</strong></td><td>&nbsp;: <?= $jurusan ?></td>
        </tr><tr><td><strong>Tahun Ajaran (Semester)</strong></td><td>&nbsp;: <?= $thn_ajar.'&nbsp;('.$semester.')'; ?></td>
        </tr>
    </table>
    </center>
    <?= anchor('administrator/jadwal/tambah_jadwal','<button class="btn btn-success btn-sm mb-1"><i class="fas fa-plus fa-sm"> TAMBAH DATA JADWAL</i></button>') ?> 
    <?= anchor('administrator/jadwal/print','<button class="btn btn-info btn-sm mb-1"><i class="fas fa-print fa-sm"> PRINT DATA JADWAL</i></button>') ?> 
    <table class="table table-bordered table-hover table-striped">
        <tr><th>NO</th><th>KODE MAPEL</th><th>NAMA MAPEL</th><th>KELAS</th><th>HARI/JAM</th><th>RUANGAN</th><th>SEMESTER</th><th colspan="2">AKSI</th></tr>
        <?php $no =1; foreach($jadwal_data as $jdl) : ?>
            <tr><td width="20px"><?= $no++ ?></td><td><?php echo $jdl->kode_mapel; ?></td><td><?php echo $jdl->nama_mp; ?></td><td><?php echo $jdl->kelas; ?></td>
                <td>Sesi 1. <?php echo $jdl->hari_jam; ?><br>Sesi 2. <?php echo $jdl->hari_jam2; ?> </td><td><?php echo $jdl->ruangan; ?></td>
                <td> <?php if ($jdl->semester==1){echo "Ganjil"; } else { echo "Genap"; } ?></td>
                <td width="20px"><?= anchor('administrator/jadwal/update/'.$jdl->id_jadwal,'<div class="btn btn-sm btn-success"><i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/jadwal/delete/'.$jdl->id_jadwal,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
            </tr><?php endforeach; ?>
    </table>
</div>