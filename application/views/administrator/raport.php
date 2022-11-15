<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> RAPORT
    </div>
    <?= $this->session->flashdata('pesan')?>
    
    <center class="mb-3">
        <legend class="mt-3"> <strong>RAPORT</strong></legend>

    <table class="mt-3">
        <tr>
            <td><strong>NIS</strong></td>
            <td>&nbsp;: <?= $sis_nis ?></td>
        </tr>
        <tr>
            <td><strong>Nama Lengkap</strong></td>
            <td>&nbsp;: <?= $sis_nama ?></td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td>&nbsp;: <?= $sis_jurusan ?></td>
        </tr>
        <tr>
            <td><strong>Tahun Ajaran (Semester)</strong></td>
            <td>&nbsp;: <?= $sis_ajar ?></td>
        </tr>
    </table>
    </center>
    <?= anchor('administrator/jadwal/print_jadwal','<button class="btn btn-info btn-sm mb-1"><i class="fas fa-print fa-sm"> PRINT DATA JADWAL</i></button>') ?> 
    <table class="table table-bordered table-hover table-dark table-striped mb-lg-5 table-responsive-lg table-sm">
        <tr class="bg-success">
            <th>NO</th>
            <th width="20">KODE MAPEL</th>
            <th width="40">NAMA MAPEL</th>
            <th>NILAI</th>

        </tr>
        <?php
        $no =1;
        $jumlahNilai=0;
        $nilai=0;
        $rataRata=0;
        foreach($sis_data as $row) : ?>
            <tr>
                <td width="20px"><?= $no++ ?></td>
                <td><?php echo $row->kode_mapel; ?></td>
                <td><?php echo $row->nama_mp; ?></td>
                <td><?php echo $row->nilai; ?></td>
            <?php
                $rataRata += $row->rata_rata;
                $nilai += $row->nilai;
                  
            ?>
            </tr>
        <?php endforeach; ?>
        <tr><td colspan="3" class="bg-info">Jumlah Nilai : <?= $nilai ?></td> <td></td></tr>
        <tr><td colspan="3" class="bg-info">Rata-Rata : <?= number_format($nilai/$rataRata,2) ?></td> <td></td></tr>
        
        
    </table>
    <br><br><br>
</div>