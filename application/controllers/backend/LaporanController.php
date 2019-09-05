<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once FCPATH."vendor/autoload.php";
class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KategoriModel','ProdukModel','CrudModel','PembelianModel');
		$helper = array('nominal');
		$this->load->model($model);
		$this->load->helper($helper);
	}

	// public function index()
	// {
	// 	$data = array(
	// 		'title' => 'Data Laporan | Wedding Organizer',
	// 		'page_title' => 'Data Laporan',
	// 		'icon_title' => 'fa-group',
	// 		'pembelian' => $this->PembelianModel->lihat_pembelian()
	// 	);
	// 	$this->load->view('backend/templates/header', $data);
	// 	$this->load->view('backend/laporan/index');
	// 	$this->load->view('backend/templates/footer');
	// }
	public function index()
	{

        if (!$this->session->has_userdata('session_username')){
            redirect(site_url('login'));
        }

        if (isset($_POST['lihat'])) {
        $data = array(
			'title' => 'Data Laporan | Wedding Organizer',
			'page_title' => 'Data Laporan',
			'icon_title' => 'fa-group',
			'pembelian' => $this->PembelianModel->lihat_pembelian()
		);
        $data['pembelian'] = $this->PembelianModel->lihat_pembelian_tgl($this->input->post('tgl_dari1'),$this->input->post('tgl_sampai1'));
        
        $this->load->view('backend/templates/header',$data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('backend/templates/footer');    
        }
        elseif (isset($_POST['export'])) {

        if ($this->input->post('tgl_dari1')=='' && $this->input->post('tgl_sampai1')=='') {
            echo 'Silahkan Set Tanggal Terlebih Dahulu';
        }else{
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


        $result = $this->PembelianModel->lihat_pembelian_tgl($this->input->post('tgl_dari1'),$this->input->post('tgl_sampai1'));

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

        $filename = 'Data Laporan '.$this->input->post('tgl_dari1').' - '.$this->input->post('tgl_sampai1');
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
        $excelWriter->save("php://output");
        }

        }
        else{
        $data = array(
			'title' => 'Data Laporan | Wedding Organizer',
			'page_title' => 'Data Laporan',
			'icon_title' => 'fa-group',
			'pembelian' => $this->PembelianModel->lihat_pembelian()
		);
		$this->load->view('backend/templates/header', $data);
		$this->load->view('backend/laporan/index',$data);
		$this->load->view('backend/templates/footer');
        }
        
		
	}
    public function laporan(){
  
            $dari = $this->input->post('tgl_dari');
            $sampai = $this->input->post('tgl_sampai');
            
        $data = array(
            'title' => 'Data Laporan | Wedding Organizer',
            'page_title' => 'Data Laporan',
            'icon_title' => 'fa-file',
            'pembelian' => $this->PembelianModel->lihat_pembelian_tgl($dari,$sampai)
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/laporan/index',$data);
        $this->load->view('backend/templates/footer');

    }
    public function harian(){
  
            $hari = $this->input->post('tgl');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            
        $data = array(
            'title' => 'Data Laporan Harian | Wedding Organizer',
            'page_title' => 'Data Laporan Harian',
            'icon_title' => 'fa-file',
            'pembelian' => $this->PembelianModel->getLaporanHarian($hari,$bulan,$tahun)
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/laporan/harian',$data);
        $this->load->view('backend/templates/footer');

    }
    public function bulanan(){
  
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            
        $data = array(
            'title' => 'Data Laporan Bulanan | Wedding Organizer',
            'page_title' => 'Data Laporan Bulanan',
            'icon_title' => 'fa-file',
            'pembelian' => $this->PembelianModel->getLaporanBulanan($bulan,$tahun)
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/laporan/bulanan',$data);
        $this->load->view('backend/templates/footer');

    }
    public function tahunan(){
  
            $tahun = $this->input->post('tahun');
            
        $data = array(
            'title' => 'Data Laporan Tahunan | Wedding Organizer',
            'page_title' => 'Data Laporan Tahunan',
            'icon_title' => 'fa-file',
            'pembelian' => $this->PembelianModel->getLaporanTahunan($tahun)
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/laporan/tahunan',$data);
        $this->load->view('backend/templates/footer');

    }
    public function acara(){
  
            
        $data = array(
            'title' => 'Data Laporan Acara | Wedding Organizer',
            'page_title' => 'Data Laporan Acara',
            'icon_title' => 'fa-file',
            'pembelian' => $this->PembelianModel->lihat_pembelian()
        );
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/laporan/acara',$data);
        $this->load->view('backend/templates/footer');

    }

}

