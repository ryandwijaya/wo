<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once FCPATH."vendor/autoload.php";
class PembelianController extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$model = array('CrudModel','PembelianModel','PembayaranModel');
		$this->load->model($model);
	}

	public function index(){
		$data = array(
			'title' => 'Data Pembelian | Wedding Organizer',
			'page_title' => 'Data Pembelian',
			'icon_title' => 'fa-money',
			'petugas' => $this->CrudModel->view_data('tb_petugas','petugas_date_created')
		);
		if ($this->session->userdata('session_level')=='pelanggan'){

		$data['pembelian'] = $this->PembelianModel->lihat_by_pelanggan($this->session->userdata('session_id'));
		}else{

		$data['pembelian'] = $this->PembelianModel->lihat_pembelian();
		}
					
		
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/pembelian/index',$data);
		$this->load->view('backend/templates/footer');
	}

	public function lihat($id){
		$data = array(
			'title' => 'Data Pembelian | Wedding Organizer',
			'page_title' => 'Detail Pembelian',
			'icon_title' => 'fa-product-hunt',
			'pembelian' => $this->PembelianModel->lihat_by_id($id)
		);
		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/pembelian/lihat',$data);
		$this->load->view('backend/templates/footer');


	}
    public function kwitansi_dp($id){
        $data = array(
            'title' => 'Cetak Kwitansi | Wedding Organizer',
            'page_title' => 'Kwitansi DP',
            'icon_title' => 'fa-product-hunt',
            'pembayaran' => $this->PembayaranModel->lihat_satu_pembelian($id)
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/pembelian/kwitansi_dp',$data);
        $this->load->view('backend/templates/footer');


    }
    public function kwitansi_lunas($id){
        $data = array(
            'title' => 'Cetak Kwitansi Lunas | Wedding Organizer',
            'page_title' => 'Kwitansi Lunas',
            'icon_title' => 'fa-product-hunt',
            'pembayaran' => $this->PembayaranModel->lihat_satu_pembelian($id)
        );
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/pembelian/kwitansi_lunas',$data);
        $this->load->view('backend/templates/footer');


    }
	public function add_petugas($id){
		for ($i = 1; $i <5 ; $i++) {
			$petugas[$i] = [
			    'tugas_petugas' => $this->input->post('petugas'.$i), 
			    'tugas_pembelian' => $id, 
			];
			$this->CrudModel->insert('tb_tugas',$petugas[$i]);
		}
		$this->session->set_flashdata('alert', 'success_post');
		redirect(base_url('admin/pembelian'));

	}
	public function exportBayar(){
		$inputFileName = 'assets/doc/laporan.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
        $excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
        $spreadsheet->setActiveSheetIndex(0);

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );


        $result = $this->PembelianModel->lihat_pembelian_status('sbayar');

        $activeSheet = $spreadsheet->getActiveSheet();
        $row = 5;
        $no = 1;
        for ($i = 0; $i < count($result); $i++) {
            
            $activeSheet->setCellValue('A' . $row, '' . $no)
                ->getStyle('A' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $row, '' . $result[$i]['pelanggan_nama'])
                ->getStyle('B' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $row, '' . $result[$i]['produk_nama'])
                ->getStyle('C' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $row, '' . nominal($result[$i]['pembelian_total']))
                ->getStyle('D' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $row, '' . $result[$i]['pembelian_status'])
                ->getStyle('E' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $row, '' . $result[$i]['pembelian_tgl'])
                ->getStyle('F' . $row)->applyFromArray($styleArray);
                     
            $row++;
            $no++;
        }

        $filename = 'Data Laporan';
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $excelWriter->save("php://output");
        }

        public function exportBelum(){
		$inputFileName = 'assets/doc/laporan.xlsx';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);  /*----Spreadsheet object-----*/
        $excelWriter = new Xlsx($spreadsheet);  /*----- Excel (Xlss) Object*/
        $spreadsheet->setActiveSheetIndex(0);

        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );


        $result = $this->PembelianModel->lihat_pembelian_status('bbayar');

        $activeSheet = $spreadsheet->getActiveSheet();
        $row = 5;
        $no = 1;
        for ($i = 0; $i < count($result); $i++) {
            
            $activeSheet->setCellValue('A' . $row, '' . $no)
                ->getStyle('A' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('B' . $row, '' . $result[$i]['pelanggan_nama'])
                ->getStyle('B' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('C' . $row, '' . $result[$i]['produk_nama'])
                ->getStyle('C' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('D' . $row, '' . nominal($result[$i]['pembelian_total']))
                ->getStyle('D' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('E' . $row, '' . $result[$i]['pembelian_status'])
                ->getStyle('E' . $row)->applyFromArray($styleArray);
            $activeSheet->setCellValue('F' . $row, '' . $result[$i]['pembelian_tgl'])
                ->getStyle('F' . $row)->applyFromArray($styleArray);
                     
            $row++;
            $no++;
        }

        $filename = 'Data Laporan';
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $excelWriter->save("php://output");
        }

        



}
