<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="https://cdn.pixabay.com/photo/2015/10/22/16/42/village-icon-1001598_960_720.png">

    <title>LANDAS</title>

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.mini.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/stylee.css">

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
        <div class="row">
            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first">
                    <div class="caption">
                        <div class="container">
                            <?= ($this->session->flashdata('flash')); ?>
                            <div class="col-md-6 col-sm-12">
                                <?= ($this->session->flashdata('flash')); ?>
                                <h1>Layanan Administrasi Kelurahan Kuta Gambir.</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Layanan Administrasi Kelurahan.</h1>
                                <h3>Berbagai fitur aplikasi kelurahan gratis untuk menghilangkan kesenjangan teknologi di kelurahan. Berbagai macam layanan administrasi dalam satu platform.</h3>
                            </div>
                        </div>
                    </div>
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