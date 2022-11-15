<div class="container-fluid">
    
    <div class="alert alert-success" role="alert">
        <i class="fas fa-eye"></i> DETAIL SISWA
    </div>
        <table class="table table-hover table-bordered table-striped table-dark table-responsive-lg table-sm">

            <?php foreach ($detail as $dt) : ?>

                <img class="mb-3"src="<?= base_url('assets/uploads/').$dt->photo; ?>" width="15%" >

                <tr>
                    <td class="bg-success">NIS</td>
                    <td><?= $dt->nis; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">NAMA LENGKAP</td>
                    <td><?= $dt->nama_lengkap; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">ALAMAT</td>
                    <td><?= $dt->alamat; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">EMAIL</td>
                    <td><?= $dt->email; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">TELEPON</td>
                    <td><?= $dt->telepon; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">TEMPAT LAHIR</td>
                    <td><?= $dt->tempat_lahir; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">TANGGAL LAHIR</td>
                    <td><?= $dt->tanggal_lahir; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">JENIS KELAMIN</td>
                    <td><?= $dt->jenis_kelamin; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">JURUSAN</td>
                    <td><?= $dt->jurusan; ?></td>
                </tr>
                <tr>
                    <td class="bg-success">KELAS</td>
                    <td><?= $dt->kelas; ?></td>
                </tr>

                <?php endforeach; ?>
        </table>
    <?= anchor('administrator/siswa','<div class="btn btn-sm btn-success float-right mb-5">Kembali</div>'); ?>
    <br>
    <br>
    <br>
    <br>

</div>