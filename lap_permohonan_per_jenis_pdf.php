<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('arial','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
$pdf->Text(50,17,'LAPORAN DAFTAR PERMOHONAN BEASISWA PER JENIS BEASISWA');
$pdf->Setfont('arial','B','20');
$pdf->SetFillcolor(100,255,255);
$pdf->Image('images/logo.png', 10, 10, 35, 30);
$pdf->SetFillcolor(100,255,255);
$pdf->Setfont('arial','B','15');
$pdf->Text(50,27,'AKADEMIK MANAJEMEN INFORMATIKA KOMPUTER MEDAN BUSSINESS POLYTECHNIC');
$pdf->Setfont('arial','B','9');
$pdf->SetFillcolor(100,255,255);
$pdf->Text(50,35,'Jl. Letjend. Djamin Ginting No. 285-287, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155');
$pdf->Line(10,55,353,55);
$pdf->Line(10,57,353,57);
$kd_jenisbeasiswa = $_POST['kd_jenisbeasiswa'];
$lap_calon_siswa=mysql_query("select * from permohonan,pendaftaran,jenis_beasiswa where permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and  pendaftaran.kd_jenisbeasiswa='$kd_jenisbeasiswa'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(20);
$pdf->cell(10,60,'JENIS BEASISWA YANG DIMOHON        : '.$hasil[nm_jenisbeasiswa],0,1,'L',0);

$pdf->SetFillcolor(200,20,10);
$pdf->Line(10,56,353,56);
$pdf->Setfont('arial','B','12');
$pdf->Ln(-20);
$pdf->Setfont('arial','','9');
$pdf->Cell(15,12,'NO',1,0,'C',1);
$pdf->Cell(25,12,'NPM',1,0,'C',1);
$pdf->Cell(65,12,'NAMA MAHASISWA',1,0,'C',1);
$pdf->Cell(60,12,'TTL',1,0,'C',1);
$pdf->Cell(20,12,'KELAMIN',1,0,'C',1);
$pdf->Cell(35,12,'AGAMA',1,0,'C',1);
$pdf->Cell(40,12,'TGL. REGISTRASI',1,0,'C',1);
$pdf->Cell(41,12,'TGL. MOHON',1,0,'C',1);
$pdf->Cell(41,12,'NO. PERMOHONAN',1,0,'C',1);

$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Setfont('arial','','9');
$kd_jenisbeasiswa = $_POST['kd_jenisbeasiswa'];
$lap_calon_siswa=mysql_query("select * from permohonan,pendaftaran,jenis_beasiswa where permohonan.npm=pendaftaran.npm and pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa and  pendaftaran.kd_jenisbeasiswa='$kd_jenisbeasiswa'");
while($hasil=mysql_fetch_array($lap_calon_siswa))
{
$pdf->Ln(10);
$pdf->Cell(15,12,$no,1,0,'C',1);
$pdf->Cell(25,12,$hasil[npm],1,0,'L',1);
$pdf->Cell(65,12,$hasil[nm_mahasiswa],1,0,'L',1);
$pdf->Cell(60,12,$hasil[tpt_lahir].', '.$hasil[tgl_lahir],1,0,'L',1);
$pdf->Cell(20,12,$hasil[jns_kelamin],1,0,'L',1);
$pdf->Cell(35,12,$hasil[agama],1,0,'L',1);
$pdf->Cell(40,12,$hasil[tgl_registrasi],1,0,'L',1);
$pdf->Cell(41,12,$hasil[tgl_permohonan],1,0,'L',1);
$pdf->Cell(41,12,$hasil[id_permohonan],1,0,'L',1);
	
$no++;
}
}
$pdf->Ln(15);
$pdf->Cell(252,12,'Medan ,   '. date( 'd / m / Y') ,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(248.5,12,'BAGIAN AKADEMIK' ,0,0,'R',0);
$pdf->Ln(35);
$pdf->Cell(285,12,'_____________________________________' ,0,0,'R',0);
$pdf->Output();

?>