<?php  
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Kel._Kuta_Gambir%2C_Sidikalang%2C_Dairi.jpg/1920px-Kel._Kuta_Gambir%2C_Sidikalang%2C_Dairi.jpg">

    <title>LANDAS</title>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.mini.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/stylee.css">

    <style>
        body{
    margin-top:20px;
    background:#eee;
}


/*** Portfolio page
==============================================================================*/

.card {
    margin-bottom: 20px;
}

.card-header {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background-size: cover;
    background-position: center center;
    padding: 30px 15px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.card-header-menu {
    position: absolute;
    top: 0;
    right: 0;
    height: 4em;
    width: 4em;
}

.card-header-menu:after {
    position: absolute;
    top: 0;
    right: 0;
    content: "";
    border-left: 2em solid transparent;
    border-bottom: 2em solid transparent;
    border-right: 2em solid #37a000;
    border-top: 2em solid #37a000;
    border-top-right-radius: 4px;
}

.card-header-menu i {
    position: absolute;
    top: 9px;
    right: 9px;
    color: #fff;
    z-index: 1;
}

.card-header-headshot {
    height: 6em;
    width: 6em;
    border-radius: 50%;
    border: 2px solid #37a000;
    background-image: url('http://bootdey.com/img/Content/avatar/avatar6.png');
    background-size: cover;
    background-position: center center;
    box-shadow: 1px 3px 3px #3E4142;
}

.card-content-member {
    position: relative;
    background-color: #fff;
    padding: 1em;
    box-shadow: 0 2px 2px rgba(62, 65, 66, 0.15);
}

.card-content-member {
    text-align: center;
}

.card-content-member p i {
    font-size: 16px;
    margin-right: 10px;
}

.card-content-languages {
    background-color: #fff;
    padding: 15px;
}

.card-content-languages .card-content-languages-group {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding-bottom: 0.5em;
}

.card-content-languages .card-content-languages-group:last-of-type {
    padding-bottom: 0;
}

.card-content-languages .card-content-languages-group > div:first-of-type {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 5em;
    flex: 0 0 5em;
}

.card-content-languages h4 {
    line-height: 1.5em;
    margin: 0;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.card-content-languages li {
    display: inline-block;
    padding-right: 0.5em;
    font-size: 0.9em;
    line-height: 1.5em;
}

.card-content-summary {
    background-color: #fff;
    padding: 15px;
}

.card-content-summary p {
    text-align: center;
    font-size: 12px;
    font-weight: 600;
}

.card-footer-stats {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background-color: #2c3136;
}

.card-footer-stats div {
    -webkit-box-flex: 1;
    -ms-flex: 1 0 33%;
    flex: 1 0 33%;
    padding: 0.75em;
}

.card-footer-stats div:nth-of-type(2) {
    border-left: 1px solid #3E4142;
    border-right: 1px solid #3E4142;
}

.card-footer-stats p {
    font-size: 0.8em;
    color: #A6A6A6;
    margin-bottom: 0.4em;
    font-weight: 600;
    text-transform: uppercase;
}

.card-footer-stats i {
    color: #ddd;
}

.card-footer-stats span {
    color: #ddd;
}

.card-footer-stats span.stats-small {
    font-size: 0.9em;
}

.card-footer-message {
    background-color: #37a000;
    padding: 15px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}

.card-footer-message h4 {
    margin: 0;
    text-align: center;
    color: #fff;
    font-weight: 400;
}

.review-number {
    float: left;
    width: 35px;
    line-height: 1;
}

.review-number div {
    height: 9px;
    margin: 5px 0
}

.review-progress {
    float: left;
    width: 230px;
}

.review-progress .progress {
    margin: 8px 0;
}

.progress-number {
    margin-left: 10px;
    float: left;
}

.rating-block,
.review-block {
    background-color: #fff;
    border: 1px solid #e1e6ef;
    padding: 15px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.review-block {
    margin-bottom: 20px;
}

.review-block-img img {
    height: 60px;
    width: 60px;
}

.review-block-name {
    font-size: 12px;
    margin: 10px 0;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.review-block-name a {
    color: #374767;
}

.review-block-date {
    font-size: 12px;
}

.review-block-rate {
    font-size: 13px;
    margin-bottom: 15px;
}

.review-block-title {
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
}

.review-block-description {
    font-size: 13px;
}



/* Widgets page
==============================================================================*/


/*-- Monthly calender --*/

.monthly_calender {
    width: 100%;
    max-width: 600px;
    display: inline-block;
}


/*-- Profile widget --*/

.profile-widget .panel-heading {
    min-height: 200px;
    background: #fff url(../img/profile-1024x640.jpg) no-repeat top center;
    background-size: cover;
}

.profile-widget .media-heading {
    color: #5B5147;
}

.profile-widget .panel-body {
    padding: 25px 15px;
}

.profile-widget .panel-body .img-circle {
    height: 90px;
    width: 90px;
    padding: 8px;
    border: 1px solid #e2dfdc;
}

.profile-widget .panel-footer {
    padding: 0px;
    border: none;
}

.profile-widget .panel-footer .btn-group .btn {
    border: none;
    font-size: 1.2em;
    background-color: #F6F1ED;
    color: #BAACA3;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    padding: 15px 0;
}

.profile-widget .panel-footer .btn-group .btn:hover {
    color: #F6F1ED;
    background-color: #8F7F70;
}

.profile-widget .panel-footer .btn-group>.btn:not(:first-child) {
    border-left: 1px solid #fff;
}

.profile-widget .panel-footer .btn-group .highlight {
    color: #E56E4C;
}
    </style>
</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="<?= base_url(); ?>" class="navbar-brand">LANDAS.</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="<?= base_url(); ?>profil">Profil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGIN<span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url(); ?>auth/login">Bagian Umum</a></li>
                            <li><a href="<?= base_url(); ?>auth/loginm">Masyarakat</a></li>
                            <li><a href="<?= base_url(); ?>auth/loginr"> Lurah</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </section>

    <!-- HOME -->
    <section id="home">
        <div class="container">
            <div class="row">
                <div class="container bootdey">
                    <section class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-header" style="background-image: url('<?= base_url().'assets/img/profil_kelurahan/' ?><?= $profil['foto_kelurahan'];?>');">
                                    <div class="card-header-menu">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    <div style="height:100px"></div>
                                </div>
                                <div class="card-content">
                                    <div class="card-content-member">
                                        <h4 class="m-t-0"><?= $profil['nama_kelurahan'];?></h4>
                                        <p class="m-0"><i class="pe-7s-map-marker"></i><?= $profil['deskripsi_kelurahan'];?></p>
                                    </div>
                                    <div class="card-content-languages">
                                    <h5> Kondisi Demografi</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Jumlah Penduduk</td>
                                                <td>:</td>
                                                <td><?= $demografi['jumlah_penduduk'] ?> Jiwa</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah KK</td>
                                                <td>:</td>
                                                <td><?= $demografi['jumlah_kk'] ?> KK</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Laki-Laki</td>
                                                <td>:</td>
                                                <td><?= $demografi['jumlah_laki'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Perempuan</td>
                                                <td>:</td>
                                                <td><?= $demografi['jumlah_perempuan'] ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Kondisi Geografis</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Sebelah Utara</td>
                                                <td>:</td>
                                                <td><?= $geografis['sebelah_utara'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sebelah Timur</td>
                                                <td>:</td>
                                                <td><?= $geografis['sebelah_timur'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sebelah Selatan</td>
                                                <td>:</td>
                                                <td><?= $geografis['sebelah_selatan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sebelah Barat</td>
                                                <td>:</td>
                                                <td><?= $geografis['sebelah_barat'] ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Sarana Pendidikan</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Sarana Pendidikan</td>
                                                <td></td>
                                                <td>Jumlah Sarana</td>
                                            </tr>
                                            <?php foreach ($sarana_pendidikan as $sp) {?>
                                            <tr>
                                                <td><?= $sp['sarana_p']?></td>
                                                <td>:</td>
                                                <td><?= $sp['jumlah_sp']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Data Penduduk Berdasarkan Jenis Kelamin</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Kelompok Jenis Kelamin</td>
                                                <td></td>
                                                <td>Jumlah Penduduk</td>
                                                <td>Persentase Penduduk</td>
                                            </tr>
                                            <?php foreach ($jenis_kelamin as $jk) {?>
                                            <tr>
                                                <td><?= $jk['kelompok_j']?></td>
                                                <td>:</td>
                                                <td><?= $jk['jumlah_j']?></td>
                                                <td><?= $jk['persentase']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Data Agama</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Agama</td>
                                                <td></td>
                                                <td>Jumlah Penduduk</td>
                                                <td>Persentase Penduduk</td>
                                            </tr>
                                            <?php foreach ($agama as $a) {?>
                                            <tr>
                                                <td><?= $a['kelompok_a']?></td>
                                                <td>:</td>
                                                <td><?= $a['jumlah_a']?></td>
                                                <td><?= $a['persentase_a']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Data Penduduk Berdasarkan Pekerjaan</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td></td>
                                                <td>Jumlah Penduduk</td>
                                                <td>Persentase Penduduk</td>
                                            </tr>
                                            <?php foreach ($pekerjaan as $p) {?>
                                            <tr>
                                                <td><?= $p['kelompok_p']?></td>
                                                <td>:</td>
                                                <td><?= $p['jumlah_p']?></td>
                                                <td><?= $p['persentase_p']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5> Rekap Penduduk Berdasarkan Pendidikan</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Pendidikan</td>
                                                <td></td>
                                                <td>Jumlah Penduduk</td>
                                                <td>Persentase Penduduk</td>
                                            </tr>
                                            <?php foreach ($pendidikan as $s) {?>
                                            <tr>
                                                <td><?= $s['kelompok_s']?></td>
                                                <td>:</td>
                                                <td><?= $s['jumlah_s']?></td>
                                                <td><?= $s['persentase_s']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5>Sarana Kesehatan</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Sarana Kesehatan</td>
                                                <td></td>
                                                <td>Jumlah Penduduk</td>
                                            </tr>
                                            <?php foreach ($kesehatan as $k) {?>
                                            <tr>
                                                <td><?= $k['sarana_k']?></td>
                                                <td>:</td>
                                                <td><?= $k['jumlah_sk']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                    <div class="card-content-languages">
                                        <h5>Sarana Rumah Ibadah</h5>
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Sarana Ibadah</td>
                                                <td></td>
                                                <td>Jumlah Sarana</td>
                                            </tr>
                                            <?php foreach ($sarana_ibadah as $ri) {?>
                                            <tr>
                                                <td><?= $ri['sarana_ri']?></td>
                                                <td>:</td>
                                                <td><?= $ri['jumlah_ri']?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                        
                        <?php foreach ($pegawai as $p) {?>
                        <div class="col-sm-12 col-md-8">
                            <div class="review-block">
                                <!-- Pegawai -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="review-block-img">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-rounded" alt="">
                                        </div>
                                    
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-title"><?= $p['jabatan'] ?></div>
                                        <div class="review-block-description"> Nama : <?= $p['nama'] ?></div>
                                        <div class="review-block-description"> NIP  : <?= $p['nip']?></div>
                                        <div class="review-block-description"> Tanggal Lahir : <?= tgl_indo($p['tanggal_lahir'])?></div>
                                        <div class="review-block-description"> Nomor HP : <?= $p['nomor_hp']?></div>
                                    </div>
                                </div>
                                <hr>
                                <!-- End Of Pegawai -->
                            </div>
                        </div>
                        <?php } ?>

                    </div> 
                    </section>
                    </div> 
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Headquarter</h2>
                        </div>
                        <address>
                            <p>Kelurahan Kuta Gambir <br>Medan, Sumatera Utara</p>
                        </address>

                        <ul class="social-icon">
                            <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>

                        <div class="copyright-text">
                            <p>Copyright &copy; 2021 LANDAS.</p>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2>Contact Info</h2>
                        </div>
                        <address>
                            <p>+628913062013</p>
                            <p><a href="mailto:contact@company.com">landas@gmail.com</a></p>
                        </address>

                        <div class="footer_menu">
                            <h2>Quick Links</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="terms.html">Terms & Conditions</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="footer-info newsletter-form">
                        <div class="section-title">
                            <h2>Newsletter Signup</h2>
                        </div>
                        <div>
                            <div class="form-group">
                                <form action="#" method="get">
                                    <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                    <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                </form>
                                <span><sup>*</sup> Please note - we do not spam your email.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.mini.js"></script>
    <script src="<?= base_url('assets/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/smoothscroll.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.js"></script>

</body>

</html>