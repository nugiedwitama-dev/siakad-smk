<div class="container-fluid">

    <div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> DETAIL MATA PELAJARAN
    </div>

    <table class="table table-hover table-bordered table-striped table-dark table-responsive-lg table-sm">

    <?php foreach($detail as $dt) : ?>
        <tr>
            <td class="bg-success">Kode Mapel</td>
            <td><?= $dt->kode_mp; ?></td>
        </tr>
        <tr>
            <td class="bg-success">Nama Mapel</td>
            <td><?= $dt->nama_mp; ?></td>
        </tr>
        <tr>
            <td class="bg-success">Semester</td>
            <td><?= $dt->semester; ?></td>
        </tr>
        <tr>
            <td class="bg-success"> Jurusan</td>
            <td><?= $dt->jurusan; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>