<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('arial','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
$pdf->Text(60,17,'LAPORAN DAFTAR SISWA BARU PER TAHUN AJARAN');
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
$kd_kelas = $_POST['kd_kelas'];
$lap_calon_siswa=mysql_query("select * from siswa_baru,daftar_ulang,seleksi_ujian,calon_siswa,tahunajaran,kelas where siswa_baru.no_daftarulang=daftar_ulang.no_daftarulang and daftar_ulang.no_ujian=seleksi_ujian.no_ujian and seleksi_ujian.nomor_registrasi=calon_siswa.nomor_registrasi and siswa_baru.kd_kelas=kelas.kd_kelas and siswa_baru.kd_tahunajaran=tahunajaran.kd_tahunajaran and siswa_baru.kd_tahunajaran='$kd_tahunajaran'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(20);
$pdf->cell(10,60,'TAHUN AJARAN        : '.$hasil[tahunajaran],0,1,'L',0);

$pdf->SetFillcolor(100,120,120);
$pdf->Line(10,56,353,56);
$pdf->Setfont('arial','B','12');
$pdf->Ln(-20);
$pdf->Setfont('arial','','9');
$pdf->Cell(10,12,'No',1,0,'C',1);
$pdf->Cell(29,12,'NO. D.U',1,0,'C',1);
$pdf->Cell(22,12,'NISN',1,0,'C',1);
$pdf->Cell(60,12,'NAMA SISWA',1,0,'C',1);
$pdf->Cell(45,12,'TTL',1,0,'C',1);
$pdf->Cell(20,12,'KELAMIN',1,0,'C',1);
$pdf->Cell(50,12,'NAMA AYAH',1,0,'C',1);
$pdf->Cell(60,12,'ALAMAT ORTU',1,0,'C',1);
$pdf->Cell(20,12,'KELAS',1,0,'C',1);
$pdf->Cell(27,12,'T. D.U',1,0,'C',1);

$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Setfont('arial','','9');
$kd_tahunajaran = $_POST['kd_tahunajaran'];
$kd_kelas = $_POST['kd_kelas'];
$lap_calon_siswa=mysql_query("select * from siswa_baru,daftar_ulang,seleksi_ujian,calon_siswa,tahunajaran,kelas where siswa_baru.no_daftarulang=daftar_ulang.no_daftarulang and daftar_ulang.no_ujian=seleksi_ujian.no_ujian and seleksi_ujian.nomor_registrasi=calon_siswa.nomor_registrasi and siswa_baru.kd_kelas=kelas.kd_kelas and siswa_baru.kd_tahunajaran=tahunajaran.kd_tahunajaran and siswa_baru.kd_tahunajaran='$kd_tahunajaran'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(10);
$pdf->Cell(10,12,$no,1,0,'C',1);
$pdf->Cell(29,12,$hasil[no_daftarulang],1,0,'L',1);
$pdf->Cell(22,12,$hasil[nisn],1,0,'L',1);
$pdf->Cell(60,12,$hasil[nm_siswa],1,0,'L',1);
$pdf->Cell(45,12,$hasil[tpt_lahir].', '.$hasil[tgl_lahir],1,0,'L',1);
$pdf->Cell(20,12,$hasil[jns_kelamin],1,0,'L',1);
$pdf->Cell(50,12,$hasil[nm_ayah],1,0,'L',1);
$pdf->Cell(60,12,$hasil[alamat_ortu],1,0,'L',1);
$pdf->Cell(20,12,$hasil[nm_kelas],1,0,'C',1);
$pdf->Cell(27,12,$hasil[tgl_daftarulang],1,0,'C',1);
	
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