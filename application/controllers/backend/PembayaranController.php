<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranController extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$model = array('CrudModel','PembelianModel','PembayaranModel');

		$this->load->model($model);
	}

	public function index(){
		$data = array(
			'title' => 'Data Uang Masuk | Wedding Organizer',
			'page_title' => 'Data Uang Masuk',
			'icon_title' => 'fa-money',
		);
		if ($this->session->userdata('session_level')=='pelanggan'){

		$data['pembayaran'] = $this->PembayaranModel->lihat_by_pelanggan($this->session->userdata('session_id'));
		}else{
		$data['pembayaran'] = $this->PembayaranModel->lihat_pembayaran();
		}

		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/pembayaran/index',$data);
		$this->load->view('backend/templates/footer');
	}

	public function bayar($id){
			$config['upload_path'] = './assets/upload/bukti/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
			} else {
				$foto = $this->upload->data('file_name');

		$pembelian = $this->PembelianModel->lihat_by_id($id);
		$pembayaran = [
		    'pembayaran_pembelian' => $id, 
		    'pembayaran_nama' => $pembelian['pelanggan_nama'], 
		    'pembayaran_bank' => $this->input->post('pembayaran_bank'), 
		    'pembayaran_jumlah' => $this->input->post('pembayaran_jumlah'), 
		    'pembayaran_tgl' => $this->input->post('pembayaran_tgl'), 
		    'pembayaran_bukti' => $foto, 
		];
		$simpan = $this->CrudModel->insert('tb_pembayaran',$pembayaran);
		if ($simpan > 0){
				$this->session->set_flashdata('alert', 'success_post');
				redirect('admin/pembayaran');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('admin/pembayaran');
			}
			}
		}

		public function konfirmasi($id){
			
		$pembayaran = [
		    'pembayaran_status' => 'dikonfirmasi', 
		];
		$pembelian = [
		    'pembelian_status' => 'sbayar'
		];

		$simpan = $this->CrudModel->update('pembayaran_id',$id,'tb_pembayaran',$pembayaran);
		if ($simpan > 0){
				$dta = $this->PembayaranModel->lihat_satu($id);
				$this->CrudModel->update('pembelian_id',$dta['pembayaran_pembelian'],'tb_pembelian',$pembelian);
				$this->session->set_flashdata('alert', 'success_change');
				redirect('admin/pembelian');
			} else {
				$this->session->set_flashdata('alert', 'fail_edit');
				redirect('admin/pembelian');
			}
		}
		
	

}
