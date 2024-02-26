<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('arial','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
$pdf->Text(60,17,'LAPORAN DAFTAR CALON SISWA YANG LULUS/TIDAK LULUS SELEKSI BERKAS PER TAHUN AJARAN');
$pdf->Setfont('arial','B','20');
$pdf->SetFillcolor(100,255,255);
$pdf->Image('images/logo.png', 12, 10, 39, 38);
$pdf->Text(60,27,'SEKOLAH MENEGAH ATAS SWASTA MULIA PRATAMA MEDAN');
$pdf->Text(60,35,'KOTA MEDAN, PROVINSI SUMATERA UTARA');
$pdf->Setfont('arial','B','14');
$pdf->SetFillcolor(100,255,255);
$pdf->Setfont('arial','B','10');
$pdf->Text(60,44,'Jalan Jahe Raya No. 1 P. Simalingkar-Medan Tuntungan Telepon. (061)8714579, Faks. (061)8708519 e-mail : smamuliapratama_medan@yahoo.com');
$pdf->Line(10,55,353,55);
$pdf->Line(10,57,353,57);
$kd_tahunajaran = $_POST['kd_tahunajaran'];
$status_lulus	= $_POST['status_lulus'];
$lap_calon_siswa=mysql_query("select * from seleksi_brks,calon_siswa,tahunajaran where seleksi_brks.nomor_registrasi=calon_siswa.nomor_registrasi and seleksi_brks.kd_tahunajaran=tahunajaran.kd_tahunajaran and seleksi_brks.kd_tahunajaran='$kd_tahunajaran' and seleksi_brks.status_lulus='$status_lulus'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(40);
$pdf->cell(10,10,'TAHUN AJARAN        : '.$hasil[tahunajaran],0,1,'L',0);
$pdf->cell(10,10,'STATUS BERKAS        : '.$hasil[status_lulus],0,1,'L',0);

$pdf->Ln(20);
$pdf->SetFillcolor(100,220,220);
$pdf->Line(10,56,353,56);
$pdf->Setfont('arial','B','12');
$pdf->Ln(-20);
$pdf->Setfont('arial','','9');
$pdf->Cell(10,12,'No',1,0,'C',1);
$pdf->Cell(29,12,'NO. REGISTRASI',1,0,'C',1);
$pdf->Cell(80,12,'NAMA SISWA',1,0,'C',1);
$pdf->Cell(25,12,'KELAMIN',1,0,'C',1);
$pdf->Cell(80,12,'SEKOLAH ASAL',1,0,'C',1);
$pdf->Cell(30,12,'NO. TELP',1,0,'C',1);
$pdf->Cell(40,12,'STATUS BERKAS',1,0,'C',1);
$pdf->Cell(30,12,'T. DAFTAR',1,0,'C',1);
$pdf->Cell(20,12,'NUN',1,0,'C',1);

$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Setfont('arial','','9');
$kd_tahunajaran = $_POST['kd_tahunajaran'];
$status_lulus	= $_POST['status_lulus'];
$lap_calon_siswa=mysql_query("select * from seleksi_brks,calon_siswa,tahunajaran where seleksi_brks.nomor_registrasi=calon_siswa.nomor_registrasi and seleksi_brks.kd_tahunajaran=tahunajaran.kd_tahunajaran and seleksi_brks.kd_tahunajaran='$kd_tahunajaran' and seleksi_brks.status_lulus='$status_lulus'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(10);
$pdf->Cell(10,12,$no,1,0,'C',1);
$pdf->Cell(29,12,$hasil[nomor_registrasi],1,0,'L',1);
$pdf->Cell(80,12,$hasil[nm_siswa],1,0,'L',1);
$pdf->Cell(25,12,$hasil[jns_kelamin],1,0,'L',1);
$pdf->Cell(80,12,$hasil[nm_sekolah],1,0,'L',1);
$pdf->Cell(30,12,$hasil[notelp_sekolah],1,0,'L',1);
$pdf->Cell(40,12,$hasil[status_brks],1,0,'C',1);
$pdf->Cell(30,12,$hasil[tgl_daftar],1,0,'C',1);
$pdf->Cell(20,12,$hasil[nun],1,0,'C',1);
	
$no++;
}
}
$pdf->Ln(15);
$pdf->Cell(263,12,'Medan ,   '. date( 'd / m / Y') ,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(250.5,12,'TATA USAHA' ,0,0,'R',0);
$pdf->Ln(35);
$pdf->Cell(295,12,'_____________________________________' ,0,0,'R',0);
$pdf->Output();

?>