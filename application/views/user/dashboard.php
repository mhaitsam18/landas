<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>


    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5 class="card-title">Jumlah Penduduk</h5>
                    <div class="display-4"><?php echo $jumlahpen; ?></div>
                    <a href="<?= base_url('user') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="card-title">Jumlah Surat Masuk</h5>
                    <div class="display-4"><?php echo $surat_masuk; ?></div>
                    <a href="<?= base_url('user/surat_masuk') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="card-title">Jumlah Surat Keluar</h5>
                    <div class="display-4"><?php echo $surat_keluar; ?></div>
                    <a href="<?= base_url('user/surat_keluar') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="card-title">Permohonan Masuk</h5>
                    <div class="display-4"><?php echo $pmasuk; ?></div>
                    <a href="<?= base_url('user/viewpermohonan') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="card-title">Permohonan Diproses</h5>
                    <div class="display-4"><?php echo $pproses; ?></div>
                    <a href="<?= base_url('user/monitora') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-xl col-lg">
            <div class="card shadow mb-4" style="width: 18rem;">

                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5 class="card-title">Permohonan Selesai</h5>
                    <div class="display-4"><?php echo $pselesai; ?></div>
                    <a href="<?= base_url('user/monitora') ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Announcements</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($query as $u) : ?>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>user/hapusdashi/<?= $u['id']; ?>" class="btn btn-danger btn-circle btn-sm float-end" onclick="return confirm('Anda yakin ingin menghapus?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="<?= base_url(); ?>user/editdashi/<?= $u['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?= $u['isidbi'] ?>
                            </li>
                        <?php endforeach; ?>
                        <div>
                            <center>
                                <a href="<?= base_url('user/tambahdashi') ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </center>
                        </div>
                    </ul>

                </div>
            </div>
        </div>


    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat dan Prosedur</h6>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionGroup">
                        <div class="card">
                            <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    Surat Keterangan
                                </div>
                            </a>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionGroup">
                                <div class="card-body">
                                    Beberapa dokumen harus dipersiapkan terlebih dahulu sebelum mengurus pembuatan Surat Keterangan Usaha (SKU)
                                    di Kantor Kelurahan, antara lain: <br> <br>
                                    <ul class="list-group list-group-flush">
                                        <?php foreach ($syarat as $sy) : ?>
                                            <li class="list-group-item">
                                                <a href="<?= base_url(); ?>user/hapusket/<?= $sy['id']; ?>" class="btn btn-danger btn-circle btn-sm float-end" onclick="return confirm('Anda yakin ingin menghapus?');">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="<?= base_url(); ?>user/editsket/<?= $sy['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <?= $sy['syarat_ske'] ?>
                                            </li>
                                        <?php endforeach; ?>
                                        <div>
                                            <center>
                                                <a href="<?= base_url('user/tambahsket') ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus-circle"></i>
                                                </a>
                                            </center>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                                <div class="card-header" id="headingTwoo">
                                    Surat Keterangan Belum Menikah
                                </div>
                            </a>
                            <div id="collapseTwoo" class="collapse" aria-labelledby="headingTw0o" data-parent="#accordionGroup">
                                <div class="card-body">
                                    Berikut syarat Surat Keterangan Belum Menikah <br> <br>
                                    - Surat pengantar dari RT/RW setempat <br>
                                    - Fotocopy KTP elektronik pemohon <br>
                                    - Fotocopy Kartu Keluarga pemohon <br>
                                    - Fotocopy KTP elektronik dua orang saksi <br>
                                    - Surat Pernyataan Belum Menikah dari orangtua/wali yang diketahui RT/RW setempat dan dua orang saksi di atas materai 6000
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="card-header" id="headingThree">
                                    Surat Keterangan Kurang Mampu
                                </div>
                            </a>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionGroup">
                                <div class="card-body">
                                    Berikut syarat Surat Keterangan Tidak Mampu <br> <br>

                                    - Surat pengantar dan keterangan RT hingga dukuh setempat; <br>
                                    - Surat pernyataan belum terekam pada DTKS (Data Terpadu Kesejahteraan Sosial); <br>
                                    - Rincian pembiayaan biaya pendidikan atau biaya rumah sakit; <br>
                                    - Fotokopi Kartu Keluarga dan menunjukkan yang asli; <br>
                                    - Fotokopi dan e-KTP asli; <br>
                                    - Beberapa daerah akan diminta membuat surat pernyataan tidak mampu yang diketahui RT dan 2 orang saksi; <br>
                                    - Tanda lunas Pajak Bumi dan Bangunan (PBB);<br>
                                    - Pas foto rumah yang bersangkutan dari posisi depan dan samping rumah masing-masing ukuran 5R.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <div class="card-header" id="headingFour">
                                    Surat Pengantar Nikah
                                </div>
                            </a>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionGroup">
                                <div class="card-body">
                                    <b>Syarat Pengantar Nikah Muslim/Islam (Wanita) </b> <br><br>

                                    - Surat Pengantar dari RT/RW. <br>
                                    - Surat keterangan dari kelurahan dan pengantar N1 s/d N4 . <br>
                                    - Fotocopy Akta kelahiran/Ijazah Terakhir calon mempelai (2 lembar). <br>
                                    - Fotocopy KTP-el dan Kartu Keluarga (KK) calon Mempelai dan orang tua (2 lembar). <br>
                                    - Fotocopy Akta Cerai / Akta Kematian sesuai dengan statusnya (2 lembar). <br>
                                    - Fotocopy Surat Nikah orang tua calon mempelai. <br>
                                    - Surat pernyataan status perkawinan bermaterai 6000. <br>
                                    - Surat rekomendasi nikah calon mempelai pria. <br>
                                    - Foto 2 x 3 berwarna calon mempelai sebanyak 4 lembar. <br> <br>

                                    <b>Syarat Pengantar Nikah Muslim/Islam (Pria)</b> <br><br>

                                    - Surat Pengantar dari RT/RW. <br>
                                    - Surat keterangan dari kelurahan dan pengantar N1 s/d N4 . <br>
                                    - Fotocopy Akta kelahiran/Ijazah Terakhir calon mempelai (2 lembar). <br>
                                    - Fotocopy KTP-el dan Kartu Keluarga (KK) calon Mempelai dan orang tua (2 lembar). <br>
                                    - Fotocopy Akta Cerai / Akta Kematian sesuai dengan statusnya (2 lembar). <br>
                                    - Fotocopy Surat Nikah orang tua calon mempelai. <br>
                                    - Surat pernyataan status perkawinan bermaterai 6000. <br>
                                    - Foto 2 x 3 berwarna calon mempelai sebanyak 4 lembar. <br>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <div class="card-header" id="headingFive">
                                    Surat Keterangan Domisili
                                </div>
                            </a>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionGroup">
                                <div class="card-body">
                                    Berikut beberapa syarat yang perlu disiapkan untuk mengurus dan memiliki SKD dari kelurahan, antara lain: <br><br>

                                    - Berusia 17 tahun dan sudah memiliki KTP <br>
                                    - Surat Pengantar dari RT dan RW <br>
                                    - Lampirkan fotokopi KTP dan Kartu Keluarga <br>
                                    - Surat permohonan dokumen dan data <br>
                                    - Materai Rp6 ribu <br>
                                    - Pas foto 3x4 sebanyak 1 lembar <br>
                                    - Surat kuasa jika pengurus diwakilkan dan lengkapi dengan materai Rp6 ribu <br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->