<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <title></title>
</head><body>
<center class="mb-3">
        <legend><strong>JADWAL</strong></legend>
    <table>
        <tr>
            <td><strong>NIS</strong></td>
            <td>&nbsp;: <?= $nis ?></td>
        </tr>
        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>&nbsp;: <?= $nama_lengkap ?></td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td>&nbsp;: <?= $jurusan ?></td>
        </tr>
        <tr>
            <td><strong>Tahun Ajaran (Semester)</strong></td>
            <td>&nbsp;: <?= $thn_ajar.'&nbsp;('.$semester.')'; ?></td>
        </tr>
    </table>
    </center>
    <table class="table table-bordered table-hover table-striped mb-lg-5 table-sm">
        <tr>
            <th>NO</th>
            <th width="20">KODE MAPEL</th>
            <th width="40">NAMA MAPEL</th>
            <th>KELAS</th>
            <th>HARI/JAM</th>
            <th>GURU/PENGAJAR</th>
            <th>RUANGAN</th>
        </tr>
        <?php
        $no =1;
        foreach($jadwal_data as $jdl) : ?>
            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?php echo $jdl->kode_mapel; ?></td>
                <td><?php echo $jdl->nama_mp; ?></td>
                <td><?php echo $jdl->kelas; ?></td>
                <td>Sesi 1. <?php echo $jdl->hari_jam; ?> <hr>
                    Sesi 2. <?php echo $jdl->hari_jam2; ?> </td>
                <td><?php echo $jdl->guru; ?></td>
                <td><?php echo $jdl->ruangan; ?></td>
        <?php endforeach; ?>
    </table>
    <br><br><br>
</div>
<script>
		window.print();
	</script>
</body></html>