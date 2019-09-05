<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_pembayaran(){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_pembelian','tb_pembelian.pembelian_id = tb_pembayaran.pembayaran_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembayaran_status','dikonfirmasi');
		$this->db->order_by('pembayaran_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_by_pelanggan($id){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_pembelian','tb_pembelian.pembelian_id = tb_pembayaran.pembayaran_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('tb_pembelian.pembelian_pelanggan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_satu($id){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_pembelian','tb_pembelian.pembelian_id = tb_pembayaran.pembayaran_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembayaran_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function lihat_satu_pembelian($id){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_pembelian','tb_pembelian.pembelian_id = tb_pembayaran.pembayaran_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembayaran_pembelian',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	

	public function lihat_pembayaran_by_kategori($kategori){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_pembayaran.pembayaran_kategori');
		$this->db->where('tb_pembayaran.pembayaran_kategori',$kategori);
		$this->db->order_by('pembayaran_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_pembayaran($data){
		$this->db->insert('tb_pembayaran', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu_pembayaran($id){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_pembayaran.pembayaran_kategori');
		$this->db->where('tb_pembayaran.pembayaran_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_pembayaran($id,$data){
		$this->db->where('pembayaran_id',$id);
		$this->db->update('tb_pembayaran',$data);
		return $this->db->affected_rows();
	}

	public function hapus_pembayaran($id){
		$this->db->where('pembayaran_id', $id);
		$this->db->delete('tb_pembayaran');
		return $this->db->affected_rows();
	}
}
