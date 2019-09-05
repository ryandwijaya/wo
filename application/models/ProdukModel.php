<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_produk(){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_produk.produk_kategori');
		$this->db->order_by('produk_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lihat_produk_by_kategori($kategori){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_produk.produk_kategori');
		$this->db->where('tb_produk.produk_kategori',$kategori);
		$this->db->order_by('produk_date_created','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_produk($data){
		$this->db->insert('tb_produk', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu_produk($id){
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori','tb_kategori.kategori_id = tb_produk.produk_kategori');
		$this->db->where('tb_produk.produk_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_produk($id,$data){
		$this->db->where('produk_id',$id);
		$this->db->update('tb_produk',$data);
		return $this->db->affected_rows();
	}

	public function hapus_produk($id){
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_produk');
		return $this->db->affected_rows();
	}
}
