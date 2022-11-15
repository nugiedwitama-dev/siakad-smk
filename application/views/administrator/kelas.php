<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> KELAS
    </div>
    <?= $this->session->flashdata('pesan')?>

    <?= anchor('administrator/kelas/input','<button class="btn btn-success mb-2"><i class="fas fa-plus fa-sm"> TAMBAH KELAS</i></button>') ?>
    <table class="table table-bordered table-striped table-hover table-dark table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE KELAS</th>
            <th>NAMA KELAS</th>
            <th>JURUSAN</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no = 1;
        foreach ($kelas as $k) : ?>
        <tr>
            <td width="20px"><?= $no++ ?></td>
            <td><?= $k->kode_kelas ?></td>
            <td><?= $k->nama_kelas ?></td>
            <td><?= $k->jurusan ?></td>
            <td width="20px"><?= anchor('administrator/kelas/update/'.$k->id,'<div class="btn btn-sm btn-success">
                <i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/kelas/delete/'.$k->id,'<div class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>