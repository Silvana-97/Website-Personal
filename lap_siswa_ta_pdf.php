<?php
include("fpdf/fpdf.php");
include("../koneksi.php");
$pdf=new FPDF('L','mm','Legal');
$pdf->Addpage();
$pdf->Setfont('arial','B','16');
$pdf->SetFillcolor(100,255,255);
$date=date('d / M / Y');
$pdf->Ln(8);
//$cek=mysql_query("select * from siswa,kelas where siswa.kd_kelas=kelas.kd_kelas and nis='$_GET[nis]'");
$kd_tahunajaran=$_POST['kd_tahunajaran'];
$cek=mysql_query("select * from nilai,siswa,kelas,tahunajaran,mapel,guru where nilai.nis=siswa.nis and nilai.kd_kelas=kelas.kd_kelas and nilai.kd_tahunajaran=tahunajaran.kd_tahunajaran and nilai.kd_mapel=mapel.kd_mapel and nilai.nip=guru.nip and nilai.kd_tahunajaran='$kd_tahunajaran'");
$hasil=mysql_fetch_array($cek);
if($hasil[semester]=="1")
		{
			$ini="GANJIL";
		}
	else
		{
			$ini="GENAP";
		}
$pdf->Text(50,17,'LAPORAN CALON SISWA YANG MENDAFTAR PER TAHUN AJARAN ' .$hasil[tahunajaran]);
$pdf->Setfont('arial','B','20');
$pdf->SetFillcolor(100,255,255);
$pdf->Image('images/logo.png', 3, 10, 55, 30);
$pdf->SetFillcolor(100,255,255);
$pdf->Text(50,27,'SEKOLAH MENENGAH ATAS SWASTA MULIA PRATAMA MEDAN');
$pdf->Setfont('arial','B','9');
$pdf->SetFillcolor(100,255,255);
$pdf->Text(50,35,'Jalan Jahe Raya No. 1 P. Simalingkar-Medan Tuntungan Telepon. (061)8714579, Faks. (061)8708519 e-mail : smamuliapratama_medan@yahoo.com ');
$pdf->Line(10,42,345,42);
$pdf->Line(10,42.5,345,42.5);
$pdf->Ln(6);
$pdf->SetFillcolor(100,220,220);
$pdf->Line(10,43,352,43);
$pdf->Setfont('arial','B','12');
$pdf->Ln(23);
$pdf->Setfont('arial','','12','','B');
$pdf->Cell(15,12,'No',1,0,'C',1);
$pdf->Cell(25,12,'Kelas',1,0,'C',1);
$pdf->Cell(23,12,'SEMESTER',1,0,'C',1);
$pdf->Cell(55,12,'Nama Siswa',1,0,'C',1);
$pdf->Cell(65,12,'NAMA GURU',1,0,'C',1);
$pdf->Cell(75,12,'MATA PELAJARAN',1,0,'C',1);
$pdf->Cell(13,12,'RPH',1,0,'C',1);
$pdf->Cell(13,12,'PTS',1,0,'C',1);
$pdf->Cell(13,12,'PAS',1,0,'C',1);
$pdf->Cell(15,12,'NA',1,0,'C',1);
$pdf->Cell(30,12,'KETERANGAN',1,0,'C',1);
$no=1;
$pdf->SetFillcolor(255,255,255);
$pdf->Line(10,43,345,43);
$pdf->Setfont('arial','','12');
$kd_tahunajaran=$_POST['kd_tahunajaran'];
$cek=mysql_query("select * from calon_siswa where nilai.nis=siswa.nis and nilai.kd_kelas=kelas.kd_kelas and nilai.kd_tahunajaran=tahunajaran.kd_tahunajaran and nilai.kd_mapel=mapel.kd_mapel and nilai.nip=guru.nip and nilai.kd_tahunajaran='$kd_tahunajaran' order by nilai.kd_kelas='$kd_kelas' DESC");
while($hasil=mysql_fetch_array($cek))
{
	if($hasil[semester]=="1")
		{
			$ini="Ganjil";
		}
	else
		{
			$ini="Genap";
		}
	$angka=((20*$hasil[nu])/100)+((40*$hasil[uts])/100)+((40*$hasil[uas])/100);

		if ($angka >=85)
			{
				$huruf="Terlampaui";
			}
		elseif ($angka >=75& $angka<84.99)
			{
				$huruf="Tercapai";
			}
		elseif ($angka >=50& $angka<74.99)
			{
				$huruf="Tidak Tercapai";
			}
		elseif ($angka >=0 & $angka<49.99)
			{
				$huruf="Remedial";
			}
$pdf->Ln(12);
$pdf->Cell(15,12,$no,1,0,'C',1);
$pdf->Cell(25,12,$hasil[nm_kelas],1,0,'C',1);
$pdf->Cell(23,12,$ini,1,0,'C',1);
$pdf->Cell(55,12,$hasil[nama_siswa],1,0,'L',1);
$pdf->Cell(65,12,$hasil[nama_guru],1,0,'L',1);
$pdf->Cell(75,12,$hasil[nm_mapel],1,0,'L',1);
$pdf->Cell(13,12,$hasil[nu],1,0,'C',1);
$pdf->Cell(13,12,$hasil[uts],1,0,'C',1);
$pdf->Cell(13,12,$hasil[uas],1,0,'C',1);
$pdf->Cell(15,12,$angka,1,0,'C',1);
$pdf->Cell(30,12,$huruf,1,0,'L',1);
	
$no++;
}
$pdf->Ln(15);
$pdf->Cell(252,12,'Medan ,   '. date( 'd / m / Y') ,0,0,'R',0);
$pdf->Ln(5);
$pdf->Cell(233.5,12,'TATA USAHA' ,0,0,'R',0);
$pdf->Ln(35);
$pdf->Cell(295,12,'_____________________________________' ,0,0,'R',0);
$pdf->Output();

?>