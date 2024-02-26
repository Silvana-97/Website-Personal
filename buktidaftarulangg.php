<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('times','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
$pdf->Text(60,17,'BUKTI DAFTAR ULANG SISWA BARU');
$pdf->Setfont('times','B','20');
$pdf->SetFillcolor(100,255,255);
$pdf->Image('images/logo.png', 12, 10, 39, 38);
$pdf->Text(60,30,'SEKOLAH MENENGAH ATAS SWASTA GKPI PADANG BULAN MEDAN');
$pdf->Setfont('times','B','14');
$pdf->SetFillcolor(100,255,255);
$pdf->Setfont('times','B','19');
$pdf->Text(60,42,'Jl. Djamin Ginting Km. 4,5 Padang Bulan (Komplek Pamen) Medan');
$pdf->Line(10,46,351,46);
$pdf->Line(10,47,351,47);
$pdf->Ln(16);
$pdf->SetFillcolor(100,220,220);
$pdf->Line(10,49,351,49);
$pdf->Setfont('times','B','10');
$pdf->Ln(23);
$pdf->Setfont('times','','12');
$pdf->Cell(15,12,'No',1,0,'C',1);
$pdf->Cell(30,12,'No. Daftar Ulang',1,0,'C',1);
$pdf->Cell(25,12,'Tgl. Daftar',1,0,'C',1);
$pdf->Cell(40,12,'Nama Lengkap',1,0,'C',1);
$pdf->Cell(30,12,'JenKel',1,0,'C',1);
$pdf->Cell(30,12,'Tpt/Tgl. Lahir',1,0,'C',1);
$pdf->Cell(50,12,'Nama Ayah',1,0,'C',1);
$pdf->Cell(42,12,'Nama Ibu',1,0,'C',1);
$pdf->Cell(45,12,'Nama Wali',1,0,'C',1);
$pdf->Cell(35,12,'Tahun Ajaran',1,0,'C',1);
$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Setfont('times','','10');

$no_daftarulang   = $_GET['no_daftarulang']; 
$query  = mysql_query("SELECT * FROM daftar_ulang,seleksi_ujian,calon_siswa,tahunajaran WHERE daftar_ulang.no_ujian=seleksi_ujian.no_ujian and seleksi_ujian.nomor_registrasi=calon_siswa.nomor_registrasi and calon_siswa.kd_tahunajaran=tahunajaran.kd_tahunajaran and no_daftarulang='".$no_daftarulang."'");

//$dosen=mysql_query("select * from daftar,seleksi_brks where daftar.no_dftr=seleksi_brks.no_daftar order by no_dftr");
while($hasil=mysql_fetch_array($query))
{
$pdf->Ln(10);
$pdf->Cell(15,12,$no,1,0,'C',1);
$pdf->Cell(30,12,$hasil[no_daftarulang],1,0,'L',1);
$pdf->Cell(25,12,$hasil[tgl_daftarulang],1,0,'L',1);
$pdf->Cell(40,12,$hasil[nm_siswa],1,0,'L',1);
$pdf->Cell(30,12,$hasil[jns_kelamin],1,0,'L',1);
$pdf->Cell(30,12,$hasil[tpt_lahir] .$hasil[tgl_lahir],1,0,'L',1);
$pdf->Cell(50,12,$hasil[nm_ayah],1,0,'L',1);
$pdf->Cell(42,12,$hasil[nm_ibu],1,0,'L',1);
$pdf->Cell(45,12,$hasil[nm_wali],1,0,'L',1);
$pdf->Cell(35,12,$hasil[tahunajaran],1,0,'C',1);
	
$no++;

}
$pdf->Ln(15);
$pdf->Cell(270,12,               'Medan ,   '. date( 'd / m / Y') ,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(263.5,12,               'Bagian Tata Usaha' ,0,0,'R',0);
$pdf->Ln(35);
$pdf->Cell(305,12,               '_______________________________________' ,0,0,'R',0);
$pdf->Output();

?>