<div class="container-fluid">
    <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i> Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang!</h4>
        <p>Selamat datang <strong><?= $nama_user; ?></strong> di sistem informsasi sekolah SMK Semak Semak</p>
        <p class="mb-0">Anda login sebagai <strong><?= $level; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-cogs"></i> Control Panel
        </button>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <i class="fas fa-cogs"></i> Control Panel
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">SISWA</p>
                    <i class="fas fa-3x fa-user-graduate"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">THN PEMBELAJARAN</p>
                    <i class="fas fa-3x fa-calendar-alt"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">KHS</p>
                    <i class="fas fa-3x fa-book"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">GURU</p>
                    <i class="fas fa-3x fa-user-tie"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">INPUT NILAI</p>
                    <i class="fas fa-3x fa-sort-numeric-down"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">CETAK NILAI</p>
                    <i class="fas fa-3x fa-print"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">KATEGORI</p>
                    <i class="fas fa-3x fa-list-ul"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">INFO KAMPUS</p>
                    <i class="fas fa-3x fa-info"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">IDENTITAS</p>
                    <i class="fas fa-3x fa-id-card-alt"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">TENTANG KAMPUS</p>
                    <i class="fas fa-3x fa-info-circle"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">FASILITAS</p>
                    <i class="fas fa-3x fa-laptop"></i>
                    </a>
                </div>
                <div class="col-md-3 text-info text-center">
                    <a href="<?= base_url()?>"><p class="nav-link small text-info">Gallery</p>
                    <i class="fas fa-3x fa-images"></i>
                    </a>
                </div>
            </div>
            <hr>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

</div>