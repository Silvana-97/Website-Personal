<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('arial','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
$pdf->Text(50,17,'LAPORAN MAHASISWA YANG TELAH MENDAFTAR');
$pdf->Setfont('arial','B','20');
$pdf->SetFillcolor(100,255,255);
$pdf->Image('images/logo.png', 10, 10, 35, 30);
$pdf->SetFillcolor(100,255,255);
$pdf->Setfont('arial','B','15');
$pdf->Text(50,27,'AKADEMIK MANAJEMEN INFORMATIKA KOMPUTER MEDAN BUSSINESS POLYTECHNIC');
$pdf->Setfont('arial','B','9');
$pdf->SetFillcolor(100,255,255);
$pdf->Text(50,35,'Jl. Letjend. Djamin Ginting No. 285-287, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155');
$pdf->Line(10,42,352,42);
$pdf->Ln(6);
$pdf->SetFillcolor(200,20,10);
$pdf->Line(10,43,352,43);
$pdf->Setfont('arial','B','12');
$pdf->Ln(23);
$pdf->Setfont('arial','','12');
$pdf->Cell(15,12,'NO',1,0,'C',1);
$pdf->Cell(25,12,'NPM',1,0,'C',1);
$pdf->Cell(65,12,'NAMA MAHASISWA',1,0,'C',1);
$pdf->Cell(60,12,'TTL',1,0,'C',1);
$pdf->Cell(20,12,'KELAMIN',1,0,'C',1);
$pdf->Cell(35,12,'AGAMA',1,0,'C',1);
$pdf->Cell(40,12,'TGL. REGISTRASI',1,0,'C',1);
$pdf->Cell(82,12,'JENIS BEASISWA',1,0,'C',1);
$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Line(10,43,345,43);
$pdf->Setfont('arial','','12');
$guru=mysql_query("select * from pendaftaran,jenis_beasiswa where pendaftaran.kd_jenisbeasiswa=jenis_beasiswa.kd_jenisbeasiswa order by npm");
while($hasil=mysql_fetch_array($guru))
{
	if($hasil[jenis_kelamin]=="P")
		{
			$ini="Perempuan";
		}
	else
		{
			$ini="Laki-laki";
		}
$pdf->Ln(10);
$pdf->Cell(15,12,$no,1,0,'C',1);
$pdf->Cell(25,12,$hasil[npm],1,0,'L',1);
$pdf->Cell(65,12,$hasil[nm_mahasiswa],1,0,'L',1);
$pdf->Cell(60,12,$hasil[tpt_lahir].', '.$hasil[tgl_lahir],1,0,'L',1);
$pdf->Cell(20,12,$hasil[agama],1,0,'L',1);
$pdf->Cell(35,12,$hasil[jns_kelamin],1,0,'L',1);
$pdf->Cell(40,12,$hasil[tgl_registrasi],1,0,'L',1);
$pdf->Cell(82,12,$hasil[nm_jenisbeasiswa],1,0,'L',1);
	
$no++;
}
$pdf->Ln(15);
$pdf->Cell(252,12,'Medan ,   '. date( 'd / m / Y') ,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(246.5,12,'BAGIAN AKADEMIK' ,0,0,'R',0);
$pdf->Ln(35);
$pdf->Cell(295,12,'_____________________________________' ,0,0,'R',0);
$pdf->Output();

?>