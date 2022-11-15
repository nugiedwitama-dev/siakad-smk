<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> MATA PELAJARAN
    </div>
    <?= $this->session->flashdata('pesan')?>

    <?= anchor('administrator/mapel/tambah_mapel','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH MATA PELAJARAN</i></button>') ?>

    <table class="table table-bordered table-hover table-dark table-striped table-responsive-lg table-sm">

    <tr class="bg-success">
        <th>NO</th>
        <th>KODE MAPEL</th>
        <th>NAMA MAPEL</th>
        <th>JURUSAN</th>
        <th colspan="3">AKSI</th>
    </tr>

    <?php
    $no =1;
    foreach($mapel as $mp) : ?>
        <tr>
            <td width="20px"><?= $no++ ?></td>
            <td><?= $mp->kode_mp ?></td>
            <td><?= $mp->nama_mp ?></td>
            <td><?= $mp->jurusan ?></td>
            <td width="20px"><?= anchor('administrator/mapel/detail/'.$mp->kode_mp,'<div class="btn btn-sm btn-info">
                <i class="fa fa-eye"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/mapel/update/'.$mp->kode_mp,'<div class="btn btn-sm btn-success">
                <i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/mapel/delete/'.$mp->kode_mp,'<div class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i></div>') ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>