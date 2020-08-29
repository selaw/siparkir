<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Lapor_model');
        if($this->session->userdata('level')== NULL) { 
            redirect('auth');
        }
    }
    
    function index(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan

        $pdf->Image('http://localhost/siparkir.com/assets/img/logo/sea.png',10,2,50,0,'PNG');
        $pdf->Image('http://localhost/siparkir.com/assets/img/logo/logo.png',165,4,30,0,'PNG');
        $pdf->Cell(10,30,'',0,1);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'PENDAPATAN ASLI DAERAH DIBIDANG RETRIBUSI PARKIR',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'APLIKASI SiParkir.com',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
     

        $pdf->Cell(190,7,'DASAR HUKUM PARKIR',1,1,'C');
        $pdf->Cell(190,6,'1. Peraturan daerah provinsi lampung No. 23 tahun 2018 tentang Retribusi jasa usaha.',1,1);
        $pdf->Multicell(190,6,'2. Keputusan Gubernur LAMPUNG No.550 / Kep.198 / 2000 tentang penetapan lokasi parkir di sekitar tepi jalan umum dan tempat khusus di Provinsi LAMPUNG.',1,1);
        $pdf->Cell(190,6,'3. Peraturan Pemerintah REPUBLIK INDONESIA No 66 Tahun 2001 tentang retribusi daerah.',1,1);

        // Memberikan space kebawah agar tidak terlalu rapat
        $khusus = $this->Lapor_model->get_khusus();
        $umum = $this->Lapor_model->get_umum();
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,7,'PENDAPATAN ASLI DAERAH ( PAD )',1,1);
        $pdf->Cell(20,7,'No',1,0,'C');
        $pdf->Cell(70,7,'TARGET',1,0,'C');
        $pdf->Cell(100,7,'Jumlah Pendapatan',1,1,'C');

        $pdf->Cell(20,6,'1',1,0,'C');
        $pdf->Cell(70,6,'Khusus',1,0,'C');
        $pdf->Cell(100,6,'RP.'.number_format($khusus->retribusi),1,1,'C');

        $pdf->Cell(20,6,'2',1,0,'C');
        $pdf->Cell(70,6,'Umum',1,0,'C');
        $pdf->Cell(100,6,'RP.'.number_format($umum->retribusi),1,1,'C');

        $pdf->Cell(90,6,'TOTAL',1,0,'C');
        $pdf->Cell(100,6,'RP.'.number_format($umum->retribusi+$khusus->retribusi),1,1,'C');


        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,6,'No Parkir',1,0,'C');
        $pdf->Cell(27,6,'No Polisi',1,0,'C');
        $pdf->Cell(40,6,'TANGGAL',1,0,'C');
        $pdf->Cell(20,6,'LOKASI',1,0,'C');
        $pdf->Cell(30,6,'Jenis Kendaraan',1,0,'C');
        $pdf->Cell(25,6,'TARGET',1,0,'C');
        $pdf->Cell(25,6,'RETIBUSI',1,1,'C');

        $pdf->SetFont('Arial','',10);

        $parkir = $this->db->get('parkir')->result();
        foreach ($parkir as $row){
            if ($row->id_target==1) {
                $row->id_target="Khusus";
            } else{
                $row->id_target="Umum";
            }

            if ($row->id_jeniskendaraan==1) {
                $row->id_jeniskendaraan="Roda 4";
            } elseif($row->id_jeniskendaraan==2){
                $row->id_jeniskendaraan="Roda 2";
            }else{$row->id_jeniskendaraan="Tidak Terdaftar";
            }
            $pdf->Cell(25,6,$row->no_parkir,1,0,'C');
            $pdf->Cell(27,6,$row->no_polisi,1,0,'C');
            $pdf->Cell(40,6,$row->tanggal,1,0,'C');
            $pdf->Cell(20,6,$row->id_lokasi,1,0,'C');
            $pdf->Cell(30,6,$row->id_jeniskendaraan,1,0,'C');
            $pdf->Cell(25,6,$row->id_target,1,0,'C');
            $pdf->Cell(25,6,'RP.'.number_format($row->retribusi),1,1); 
        }

        $pdf->Output();
    }
}