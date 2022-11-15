<div class="container-fluid">
<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> RUANGAN
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?= anchor('administrator/ruangan/tambah_ruangan','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH RUANGAN</i></button>') ?>

    <table class="table table-bordered table-hover table-striped table-dark table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE RUANGAN</th>
            <th>NAMA RUANGAN</th>
            <th colspan="3">Aksi</th>

        </tr>

        <?php
        $no =1;
        foreach($ruangan as $r) : ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $r->kode_ruangan ?></td>
                <td><?= $r->ruangan ?></td>
                <td width="20px"><?= anchor('administrator/ruangan/update/'.$r->id_ruangan,'<div class="btn btn-sm btn-success">
                    <i class="fa fa-edit"></i></div>') ?></td>
                <td width="20px"><?= anchor('administrator/ruangan/delete/'.$r->id_ruangan,'<div class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i></div>') ?></td>
                
            </tr>

        <?php endforeach; ?>
    </table>

</div>