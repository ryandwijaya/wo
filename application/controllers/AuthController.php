<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function index()
    {

        $this->load->view('backend/auth/login');
    }

    public function login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $pelanggan = array(
                'pelanggan_username' => $username,
                'pelanggan_password' => md5($password)
            );
            $admin = array(
                'user_username' => $username,
                'user_password' => md5($password)
            );
            $validate = $this->AuthModel->getPelanggan($pelanggan)->num_rows();
            $validate2 = $this->AuthModel->getAdmin($admin)->num_rows();
            $adm = $this->AuthModel->getAdminAccount($admin);
            $plg = $this->AuthModel->getPelangganAccount($pelanggan);

            if ($validate>0) {
                $data_session = array(
                    'session_id' => $plg['pelanggan_id'],
                    'session_username' => $plg['pelanggan_username'],
                    'session_nama' => $plg['pelanggan_nama'],
                    'session_level' => 'pelanggan',
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('admin')); 
            }
            elseif ($validate2>0) {
                $data_session = array(
                    'session_id' => $adm['user_id'],
                    'session_username' => $adm['user_username'],
                    'session_nama' => $adm['user_nama'],
                    'session_level' => 'admin',
                );

                $this->session->set_flashdata('alert', 'success_login');
                $this->session->set_userdata($data_session);
                
                redirect(site_url('admin')); 
            }
            else{
                $this->session->set_flashdata('alert', 'fail_alert');
                redirect(site_url('login'));
            }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url(''));
    }
}
