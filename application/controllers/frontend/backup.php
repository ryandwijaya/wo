<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
        $this->load->model('AuthModel');
        $this->load->model('KategoriModel');
        $this->load->model('PembelianModel');
    }

    public function produk($id)
    {
        $data = array(
            'page_title' => 'Data Produk',
            'icon_title' => 'fa-product-hunt',
            'produk' => $this->ProdukModel->lihat_satu_produk($id),
        );
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/produk/satuan',$data);
        $this->load->view('frontend/templates/footer');
    }
    public function pesan($id)
    {
        if (isset($_POST['login'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $pelanggan = array(
                'pelanggan_username' => $username,
                'pelanggan_password' => md5($password)
            );
            $validate = $this->AuthModel->getPelanggan($pelanggan)->num_rows();
            $plg = $this->AuthModel->getPelangganAccount($pelanggan);

            if ($validate>0) {
                $cek_history = $this->PembelianModel->cek_pembelian($id);
                if ($cek_history>0) {
                $get_history = $this->PembelianModel->get_pembelian($id);
                $tgl_now = new  DateTime();      
                $tgl = $get_history['pembelian_tgl'];
                $waktu = explode(' ',$get_history['pembelian_tgl']);
                $tgl_beli = new DateTime($get_history['pembelian_tgl_acara']);

                
                $perbedaan = $tgl_now->diff($tgl_beli)->format("%a");
                if ($perbedaan<3) {
                    echo 'Anda Tidak Bisa Memesan Produk ini ! <br> karena produk ini sudah dipesan pada tanggal '.date_indo($get_history['pembelian_tgl_acara']) . ' yaitu '.$perbedaan.' Yang lalu <br> Minimal Pemsanan Kembali setelah 3 Hari ';
                }else{
                    $data['produk'] = $this->ProdukModel->lihat_satu_produk($id);
                    $data['pelanggan'] = $plg;
                    $this->load->view('frontend/templates/header', $data);
                    $this->load->view('frontend/produk/form_pemesanan',$data);
                    $this->load->view('frontend/templates/footer');
                }





                } else{

                $data['produk'] = $this->ProdukModel->lihat_satu_produk($id);
                $data['pelanggan'] = $plg;
                $this->load->view('frontend/templates/header', $data);
                $this->load->view('frontend/produk/form_pemesanan',$data);
                $this->load->view('frontend/templates/footer');
                }
            }else{
                $this->session->set_flashdata('alert', 'fail_alert');
                redirect(site_url('pesan/'.$id));
            }


            
        }elseif(isset($_POST['beli'])){
            $data_pembelian = [
                'pembelian_produk' =>  $this->input->post('produk_id')  ,  
                'pembelian_total' =>   $this->input->post('total') ,  
                'pembelian_status' => 'bbayar'   ,  
                'pembelian_pelanggan' => $this->input->post('pelanggan_id')   ,  
                'pembelian_tgl_acara' => $this->input->post('tgl_acara')  
            ];
            $simpan = $this->PembelianModel->tambah_pembelian($data_pembelian);
            if ($simpan>0) {
                echo 'berhasil';
            }else{
                echo 'oke';
            }
        }
        else{

        $data = array(
            'page_title' => 'Pesan Produk',
            'icon_title' => 'fa-product-hunt',
            'produk' => $this->ProdukModel->lihat_satu_produk($id),
        );
        $this->load->view('backend/auth/login_p',$data);
        }
    }
    
}
