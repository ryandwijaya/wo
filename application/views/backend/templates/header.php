<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
          content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
    <!-- /meta tags -->
    <title><?= $title ?></title>

    <!-- Site favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/backend/images/favicon.ico" type="image/x-icon">
    <!-- /site favicon -->

    <!-- Font Icon Styles -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/node_modules/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/vendors/gaxon-icon/styles.css"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- /font icon Styles -->

    <!-- Perfect Scrollbar stylesheet -->
    <link rel="stylesheet"
          href="<?php echo base_url() ?>assets/backend/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Load Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/light-style-1.min.css">
    <link href="<?= base_url() ?>assets/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"
          rel="stylesheet">
    <link href="<?= base_url() ?>assets/backend/css/animated.css" rel="stylesheet">
    <!-- /load styles -->


</head>
<body class="dt-sidebar--fixed dt-header--fixed" style="overflow: scroll;">


<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Header -->
        <header class="dt-header" style="background:cornsilk;">

            <!-- Header container -->
            <div class="dt-header__container">

                <!-- Brand -->
                <div class="dt-brand" style="background:cornsilk;">

                    <!-- Brand tool -->
                    <div class="dt-brand__tool" data-toggle="main-sidebar">
                        <div class="hamburger-inner"></div>
                    </div>
                    <!-- /brand tool -->

                    <!-- Brand logo -->
                    <span class="dt-brand__logo">
        <a class="dt-brand__logo-link justify-content-center" href="<?= base_url('admin') ?>"> <span style="font-size: 16px">Wedding Organizer</span>
        </a>
      </span>
                    <!-- /brand logo -->

                </div>
                <!-- /brand -->

                <!-- Header toolbar-->
                <div class="dt-header__toolbar">


                    <!-- Header Menu Wrapper -->
                    <div class="dt-nav-wrapper">
                        <!-- Header Menu -->
                        <ul class="dt-nav d-lg-none">
                            <li class="dt-nav__item dt-notification-search dropdown">

                                <!-- Dropdown Link -->
                                <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i
                                            class="icon icon-search icon-fw icon-lg"></i> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu">

                                    <!-- Search Box -->
                                    <form class="search-box right-side-icon">
                                        <input class="form-control form-control-lg" type="search"
                                               placeholder="Search in app...">
                                        <button type="submit" class="search-icon"><i
                                                    class="icon icon-search icon-lg"></i></button>
                                    </form>
                                    <!-- /search box -->

                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>

                        
                        <!-- /header menu -->


                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dropdown">

                                <!-- Dropdown Link -->
                                <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i>
                                    <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name"><?= $this->session->userdata('session_nama') ?></span>
              </span> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dt-avatar-wrapper flex-nowrap p-6 mt--5  text-success rounded-top" style="background:cornsilk;">
                                        <i class="fa fa-user-circle-o"></i>
                                        <span class="dt-avatar-info">
                                        <span class="dt-avatar-name"><?= $this->session->userdata('session_nama') ?></span>
                                        <span class="f-12"><?= $this->session->userdata('session_level') ?></span>
                                        </span>
                                    </div>
                                    <a class="dropdown-item" href="javascript:void(0)"> <i
                                                class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Account
                                        <!-- </a> <a class="dropdown-item" href="javascript:void(0)">
                                          <i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Setting </a> -->
                                        <a class="dropdown-item"
                                           onclick="return confirm('yakin ingin keluar dari sistem ?')"
                                           href="<?= base_url() ?>logout"> <i
                                                    class="icon icon-power-off icon-fw mr-2 mr-sm-1"></i>Logout
                                        </a>
                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->
                    </div>
                    <!-- Header Menu Wrapper -->

                </div>
                <!-- /header toolbar -->

            </div>
            <!-- /header container -->

        </header>
        <!-- /header -->
        <!-- Site Main -->
        <main class="dt-main">
            <!-- Sidebar -->
            <aside id="main-sidebar" class="dt-sidebar" style="background:cornsilk;">
                <div class="dt-sidebar__container">

                    <!-- Sidebar Navigation -->
                    <ul class="dt-side-nav">

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">main</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->

                        <li class="dt-side-nav__item">
                            <a href="<?= base_url() ?>admin" class="dt-side-nav__link" title="Dashboard"> <i
                                        class="icon icon-home icon-fw icon-lg"></i> <span class="dt-side-nav__text">Dashboard</span>
                            </a>
                        </li>



                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Data </span>
                        </li>
                        <?php if ($this->session->userdata('session_level')=='admin'): ?>
                            
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'kategori') echo 'open' ?>">
                            <a href="<?= base_url('admin/kategori') ?>"
                               class="dt-side-nav__link" title="Kategori"> <i class="fa fa-list icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Data Kategori</span> </a>
                        </li>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'produk') echo 'open' ?>">
                            <a href="<?= base_url('admin/produk') ?>"
                               class="dt-side-nav__link" title="Produk"> <i
                                        class="fa fa-product-hunt icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Data Produk</span> </a>
                        </li>
                        <?php endif ?>

                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'pembelian') echo 'open' ?>">
                            <a href="<?= base_url('admin/pembelian') ?>"
                               class="dt-side-nav__link" title="Pembelian"> <i
                                        class="fa fa-money icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Data Pembelian</span> </a>
                        </li>
                         <?php if ($this->session->userdata('session_level')=='admin'): ?>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'pembayaran') echo 'open' ?>">
                            <a href="<?= base_url('admin/pembayaran') ?>"
                               class="dt-side-nav__link" title="Uang Masuk"> <i
                                        class="fa fa-arrow-circle-o-down icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Uang Masuk</span> </a>
                        </li>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'petugas') echo 'open' ?>">
                            <a href="<?= base_url('admin/petugas') ?>"
                               class="dt-side-nav__link" title="Petugas"> <i
                                        class="fa fa-group icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Data Petugas</span> </a>
                        </li>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'laporan') echo 'open' ?>">
                            <a href="<?= base_url('admin/laporan') ?>"
                               class="dt-side-nav__link" title="Laporan"> <i
                                        class="fa fa-file icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Laporan</span> </a>
                        </li>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'acara') echo 'open' ?>">
                            <a href="<?= base_url('admin/acara') ?>"
                               class="dt-side-nav__link" title="Laporan"> <i
                                        class="fa fa-file icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Laporan Tgl Acara</span> </a>
                        </li>
                        <!-- <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'laporan/bulanan') echo 'open' ?>">
                            <a href="<?= base_url('admin/laporan/bulanan') ?>"
                               class="dt-side-nav__link" title="Laporan Bulanan"> <i
                                        class="fa fa-file icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Laporan Bulanan</span> </a>
                        </li>
                        <li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'laporan/tahunan') echo 'open' ?>">
                            <a href="<?= base_url('admin/laporan/tahunan') ?>"
                               class="dt-side-nav__link" title="Laporan Tahunan"> <i
                                        class="fa fa-file icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Laporan Tahunan</span> </a>
                        </li> -->
                        

						<li class="dt-side-nav__item dt-side-nav__header">
							<span class="dt-side-nav__text">Website</span>
						</li>


						<li class="dt-side-nav__item <?php if ($this->uri->segment(2) == 'banner') echo 'open' ?>">
							<a href="<?= base_url('admin/banner') ?>"
							   class="dt-side-nav__link" title="Banner"> <i
									class="fa fa-picture-o icon-fw icon-lg"></i>
								<span class="dt-side-nav__text">Data Banner</span> </a>
						</li>
                        <?php endif ?>
						

                        <li class="dt-side-nav__item dt-side-nav__header">
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="<?= base_url() ?>logout"
                               onclick="return confirm('yakin ingin keluar dari sistem ?')" class="dt-side-nav__link"
                               title="Cuti"> <i class="icon icon-power-off icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Logout</span> </a>
                        </li>
                        <!-- /menu item -->


                        <!-- /menu item -->

                    </ul>
                    <!-- /sidebar navigation -->

                </div>
            </aside>
            <!-- /sidebar -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title"><i class="fa <?= $icon_title ?>"></i> <?= $page_title ?></h1>
                    </div>
                    <!-- /page header -->

                    <!-- Entry Header -->
                    <div class="dt-entry__header">

                        <!-- Entry Heading -->
                        <div class="dt-entry__heading">
                            <h3 class="dt-entry__title">List Data</h3>
                        </div>
                        <!-- /entry heading -->

                    </div>
                    <!-- /entry header -->


                    <?php if ($this->session->flashdata('alert') == 'success_post') { ?>
                        <div class="alert alert-success animated shake hide-it">
                            <strong>SUKSES!!!</strong> Data berhasil ditambahkan.
                        </div>
                    <?php } ?>
                    
                    <?php if ($this->session->flashdata('alert') == 'success_delete') { ?>
                        <div class="alert alert-warning animated shake hide-it">
                            <strong>SUKSES!!!</strong> Data berhasil dihapus.
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('alert') == 'success_change') { ?>
                        <div class="alert alert-info animated shake hide-it">
                            <strong>SUKSES!!!</strong> Data berhasil diubah.
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('alert') == 'fail_edit') { ?>
                        <div class="alert alert-danger animated shake hide-it">
                            <strong>GAGAL!!!</strong> Terjadi kesalahan saat menyimpan.
                        </div>
                    <?php } ?>
                    
