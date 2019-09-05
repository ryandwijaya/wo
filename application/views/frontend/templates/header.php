<!DOCTYPE html>
<html class="no-js" lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wedding Organizer</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/frontend/img/favicon.ico">

    <!--=============================================
    =            CSS  files       =
    =============================================-->

    <!-- Vendor CSS -->
    <link href="<?= base_url() ?>assets/frontend/css/vendors.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="<?= base_url() ?>assets/frontend/css/style.css" rel="stylesheet">


</head>

<body>
    <!--====================  header area ====================-->
    <div class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  header wrapper  =======-->
                    <div class="header-wrapper d-none d-lg-flex">
                        <!-- logo -->
                        <div class="logo">
                            <a href="<?= base_url() ?>">
                                <img src="<?= base_url() ?>assets/frontend/img/logo.jpg" class="img-fluid" alt="" width="80%">
                            </a>
                        </div>
                        <!-- menu wrapper -->
                        <div class="navigation-menu-wrapper">
                            <nav>
                                <ul>
                                     <li><a href="<?= base_url() ?>">HOME</a></li>

                                    
                                    <li><a href="<?= base_url() ?>contact">CONTACT</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header icon -->
                        <div class="header-icon-wrapper">
                            <ul class="icon-list">
                                
                                
                                <li>
                                    <div class="header-settings-icon">
                                        <a href="javascript:void(0)" class="header-settings-trigger" id="header-settings-trigger">
                                            <div class="setting-button">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </a>

                                        <!-- settings menu -->
                                        <div class="settings-menu-wrapper" id="settings-menu-wrapper">
                                            <div class="single-settings-block">
                                                <h4 class="title">MY ACCOUNT </h4>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>daftar">Register</a></li>
                                                    <li><a href="<?= base_url() ?>login">Login</a></li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--=======  End of header wrapper  =======-->

                    <!--=======  mobile navigation area  =======-->

                    <div class="header-mobile-navigation d-block d-lg-none">
                        <div class="row align-items-center">
                            <div class="col-6 col-md-6">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="<?= base_url() ?>assets/frontend/img/logo.jpg" class="img-fluid" alt="" width="80%">
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="mobile-navigation text-right">
                                    <div class="header-icon-wrapper">
                                        <ul class="icon-list justify-content-end">
                                            <li>
                                                <div class="header-cart-icon">
                                                    <a href="cart.html">
                                                        <i class="ion-bag"></i>
                                                        <span class="counter">3</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--=======  End of mobile navigation area  =======-->

                </div>
            </div>
        </div>
    </div>
    <!--====================  End of header area  ====================-->

   <div class="page-content-area">
        <div class="container mt-5">
            <?php if ($this->session->flashdata('alert') == 'success_mail') { ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success hide-it">
                        <span>SUSKES!! Pesan anda sudah terkirim, kami akan merespon pesan anda melalui email. Pastikan email yang tertera adalah email aktif, Thx.</span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if ($this->session->flashdata('alert') == 'success_daftar') { ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success hide-it">
                        <span>SUSKES!! Pendaftaran Berhasil.</span>
                    </div>
                </div>
            </div>
            <?php } ?>
             <?php if ($this->session->flashdata('alert') == 'success_mesan') { ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success hide-it">
                        <span>SUSKES!! Pemesanan Berhasil.Silahkan Login untuk membayar DP ! </span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if ($this->session->flashdata('alert') == 'fail_daftar') { ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger hide-it">
                        <span>GAGAL!! Pendaftaran gagal, silahkan coba lagi.</span>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php if ($this->session->flashdata('alert') == 'fail_mesan') { ?>
                <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger hide-it">
                        <span>GAGAL!! Terjadi kesalahan silahkan coba lagi.</span>
                    </div>
                </div>
            </div>
            <?php } ?>
            

            
            
   
