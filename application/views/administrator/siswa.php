<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> SISWA
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?= anchor('administrator/siswa/tambah_siswa','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH DATA SISWA</i></button>') ?>

    <table class="table table-bordered table-hover table-dark table-striped table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>NAMA LENGKAP</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th colspan="3">Aksi</th>

        </tr>

        <?php
        $no =1;
        foreach($siswa as $sis) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $sis->nama_lengkap ?></td>
                <td><?= $sis->alamat ?></td>
                <td><?= $sis->email ?></td>
                <td width="20px"><?= anchor('administrator/siswa/detail/'.$sis->id,'<div class="btn btn-sm btn-info">
                    <i class="fa fa-eye"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/siswa/update/'.$sis->id,'<div class="btn btn-sm btn-success">
                    <i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/siswa/delete/'.$sis->id,'<div class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i></div>') ?></td>
                
            </tr>

        <?php endforeach; ?>
    </table>

</div>