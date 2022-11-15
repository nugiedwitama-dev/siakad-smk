<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> JURUSAN
    </div>
    <?= $this->session->flashdata('pesan')?>

    <?= anchor('administrator/jurusan/input','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH JURUSAN</i></button>') ?>
    <table class="table table-bordered table-striped table-hover table-dark table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE JURUSAN</th>
            <th>NAMA JURUSAN</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($jurusan as $jrs) : ?>
        <tr>
            <td width="20px"><?= $no++ ?></td>
            <td><?= $jrs->kode_jurusan ?></td>
            <td><?= $jrs->nama_jurusan ?></td>
            <td width="20px"><?= anchor('administrator/jurusan/update/'.$jrs->id_jurusan,'<div class="btn btn-sm btn-success">
                <i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/jurusan/delete/'.$jrs->id_jurusan,'<div class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i></div>') ?></td>


        </tr>
        <?php endforeach; ?>
    </table>
</div>