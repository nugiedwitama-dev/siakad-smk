<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> GURU
    </div>
    <?= $this->session->flashdata('pesan')?>
    <?= anchor('administrator/guru/tambah_guru','<button class="btn btn-success mb-5"><i class="fas fa-plus fa-sm"> TAMBAH DATA GURU</i></button>') ?> 

    <table class="table table-bordered table-striped table-hover table-dark table-table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA GURU</th>
            <th>JURUSAN</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php 
        $no=1;
        foreach($guru as $g) : ?>
        <tr>
            <td width="20px"><?= $no++ ?></td>
            <td><?= $g->nip ?></td>
            <td><?= $g->nama_guru ?></td>
            <td><?= $g->jurusan ?></td>
            <td width="20px"><?= anchor('administrator/guru/update/'.$g->id,'<div class="btn btn-sm btn-success">
                <i class="fa fa-edit"></i></div>') ?></td>
            <td width="20px"><?= anchor('administrator/guru/delete/'.$g->id,'<div class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i></div>') ?></td>
        </tr>
        <?php endforeach; ?>
        </table>

</div>