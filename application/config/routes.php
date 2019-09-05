<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    //backend
	$route['admin'] = 'backend/DashboardController';
	$route['admin/kategori'] = 'backend/KategoriController';
	$route['admin/kategori/tambah'] = 'backend/KategoriController/tambah';
	$route['admin/kategori/updateForm/(:any)'] = 'backend/KategoriController/updateForm/$1';
	$route['admin/kategori/update'] = 'backend/KategoriController/update';
	$route['admin/kategori/hapus/(:any)'] = 'backend/KategoriController/hapus/$1';




	$route['admin/produk'] = 'backend/ProdukController';
	$route['admin/produk/tambah'] = 'backend/ProdukController/tambah';
	$route['admin/produk/lihat/(:any)'] = 'backend/ProdukController/lihat/$1';
	$route['admin/produk/update/(:any)'] = 'backend/ProdukController/update/$1';
	$route['admin/produk/hapus/(:any)'] = 'backend/ProdukController/hapus/$1';

	$route['admin/pembelian'] = 'backend/PembelianController';
	$route['pembelian/detail/(:any)'] = 'backend/PembelianController/lihat/$1';
	$route['pembelian/exportBayar'] = 'backend/PembelianController/exportBayar';
	$route['pembelian/exportBelum'] = 'backend/PembelianController/exportBelum';

	$route['admin/banner'] = 'backend/BannerController';
	$route['admin/banner/tambah'] = 'backend/BannerController/tambah';
	$route['admin/banner/update/(:any)'] = 'backend/BannerController/update/$1';
	$route['admin/banner/hapus/(:any)'] = 'backend/BannerController/hapus/$1';

	//frontend
			$route['contact'] = 'frontend/ContactController/index';
			$route['contact/send'] = 'frontend/ContactController/send_pesan';

			//produk
			$route['produk/(:any)'] = 'frontend/ProductController/produk/$1';
			$route['pesan/(:any)'] = 'frontend/ProductController/pesan/$1';

  	
	$route['admin/petugas'] = 'backend/PetugasController';
	$route['admin/petugas/tambah'] = 'backend/PetugasController/tambah';
	$route['admin/petugas/hapus/(:any)'] = 'backend/PetugasController/hapus/$1';

	
	$route['admin/laporan'] = 'backend/LaporanController/laporan';
	$route['admin/acara'] = 'backend/LaporanController/acara';
	$route['admin/laporan/harian'] = 'backend/LaporanController/harian';
	$route['admin/laporan/bulanan'] = 'backend/LaporanController/bulanan';
	$route['admin/laporan/tahunan'] = 'backend/LaporanController/tahunan';

	$route['admin/pembayaran'] = 'backend/PembayaranController/index';
	$route['pembayaran/konfirmasi/(:any)'] = 'backend/PembayaranController/konfirmasi/$1';
	$route['bayar/(:any)'] = 'backend/PembayaranController/bayar/$1';
	$route['add/petugas/(:any)'] = 'backend/PembelianController/add_petugas/$1';
	$route['kwitansi/dp/(:any)'] = 'backend/PembelianController/kwitansi_dp/$1';
	$route['kwitansi/lunas/(:any)'] = 'backend/PembelianController/kwitansi_lunas/$1';


  	//default
			$route['daftar'] = 'Welcome/daftar';

  	$route['login'] = 'AuthController/index';
  	$route['logout'] = 'AuthController/logout';
  	$route['auth/login'] = 'AuthController/login';
  	$route['default_controller'] = 'Welcome';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

