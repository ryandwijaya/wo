<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_pembelian(){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->order_by('pembelian_tgl','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_pembelian_tgl($tgl_dari,$tgl_sampai){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where("tb_pembelian.pembelian_tgl BETWEEN '$tgl_dari' AND '$tgl_sampai'");
		$this->db->order_by('pembelian_tgl','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_pembelian_status($status){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembelian_status',$status);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function cek_pembelian($produk){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->where('pembelian_produk',$produk);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function cek_pembelian_tgl($produk){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->where('pembelian_produk',$produk);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_pembayaran($id){
		$this->db->select('*');
		$this->db->from('tb_pembayaran');
		$this->db->where('pembayaran_pembelian',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_pembelian($pelanngan){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembelian_produk',$pelanngan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_petugas($id){
		$this->db->select('*');
		$this->db->from('tb_tugas');
		$this->db->join('tb_petugas','tb_petugas.petugas_id = tb_tugas.tugas_petugas');
		$this->db->where('tugas_pembelian',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_by_id($id){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembelian_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function lihat_by_pelanggan($id){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
		$this->db->where('pembelian_pelanggan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_pembelian_by_kategori($kategori){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_pembelian.pembelian_kategori');
		$this->db->where('tb_pembelian.pembelian_kategori',$kategori);
		$this->db->order_by('pembelian_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_pembelian($data){
		$this->db->insert('tb_pembelian', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu_pembelian($id){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_pembelian.pembelian_kategori');
		$this->db->where('tb_pembelian.pembelian_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getLaporanHarian($hari,$bulan,$tahun){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
    	$this->db->where('DAY(pembelian_tgl)',$hari);
    	$this->db->where('MONTH(pembelian_tgl)',$bulan);
    	$this->db->where('YEAR(pembelian_tgl)',$tahun);
    	return $this->db->get()->result_array();
    }
    public function getLaporanBulanan($bulan,$tahun){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
    	$this->db->where('MONTH(pembelian_tgl)',$bulan);
    	$this->db->where('YEAR(pembelian_tgl)',$tahun);
    	return $this->db->get()->result_array();
    }
     public function getLaporanTahunan($tahun){
		$this->db->select('*');
		$this->db->from('tb_pembelian');
		$this->db->join('tb_pelanggan','tb_pelanggan.pelanggan_id = tb_pembelian.pembelian_pelanggan');
		$this->db->join('tb_produk','tb_produk.produk_id = tb_pembelian.pembelian_produk');
    	$this->db->where('YEAR(pembelian_tgl)',$tahun);
    	return $this->db->get()->result_array();
    }

	public function update_pembelian($id,$data){
		$this->db->where('pembelian_id',$id);
		$this->db->update('tb_pembelian',$data);
		return $this->db->affected_rows();
	}

	public function hapus_pembelian($id){
		$this->db->where('pembelian_id', $id);
		$this->db->delete('tb_pembelian');
		return $this->db->affected_rows();
	}
}
