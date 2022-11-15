<div class="container-fluid">
<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> SISWA
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?= anchor('administrator/tahun_ajaran/tambah_tahun_ajaran','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH TAHUN AJARAN</i></button>') ?>
    <table class="table table-bordered table-striped table-hover table-dark table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>TAHUN AJARAN</th>
            <th>SEMESTER</th>
            <th>STATUS</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach($tahun_ajaran as $ta) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ta->tahun_ajaran ?></td>
            <td><?= $ta->semester ?></td>
            <td><?= $ta->status ?></td>
            <td width="20px"><?= anchor('administrator/tahun_ajaran/update/'.$ta->id_thn_ajar,'<div class="btn btn-sm btn-success">
                <i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/tahun_ajaran/delete/'.$ta->id_thn_ajar,'<div class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>