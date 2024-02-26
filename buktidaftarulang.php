<?php
session_start();
ob_start();
include_once("../koneksi.php");
$no_daftarulang   = $_GET['no_daftarulang']; 
$query  = mysql_query("SELECT * FROM daftar_ulang,seleksi_ujian,calon_siswa WHERE daftar_ulang.no_ujian=seleksi_ujian.no_ujian and seleksi_ujian.nomor_registrasi=calon_siswa.nomor_registrasi and no_daftarulang='".$kode."'");
$data   = mysql_fetch_array($query);

//Untuk menampilkan data kepala sekolah
$kepsek  = mysql_query("SELECT * FROM tb_guru WHERE jabatan='Kepala Sekolah'");
$kepsek_1   = mysql_fetch_array($kepsek);

?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['no_daftarulang']; ?></title>
</head>
<body>
<?php
echo '<table border="0" width="100%">
  <tr>
    <td width="9%" rowspan="6" align="center"><img src="images/logo.png" width="100" height="105"></td>
    <td width="82%">&nbsp;</td>
    <td width="9%" rowspan="5" align="center"><img src="images/tutwuri.png" width="100" height="105"></td>
  </tr>
  <tr>
    <td align="center"><b>BUKTI DAFTAR ULANG</b></td>
  </tr>
  <tr>
    <td align="center">PENERIMAAN PESERTA DIDIK BARU (PPDB) ONLINE</td>
  </tr>
  <tr>
    <td align="center">YAYASAN PENDIDIKAN GKPI PADANG BULAN (PAMEN) MEDAN</td>
  </tr>
  <tr>
    <td align="center">SEKOLAH MENENGAH ATAS (SMA) SWASTA GKPI PADANG BULAN MEDAN</td>
  </tr>
  <tr>
  	<td align="center" style="font-size:8px">Jln. Djamin Ginting Km. 4,5 Komplek Pamen-Medan Baru, Telp. (061) 8913877882</td>
  </tr>
  <tr>
  	<td colspan="3"><hr></td>
  </tr>
</table>';
?>
<?php
echo '<table border="0">
  <tr>
    <td width="150">TANGGAL DAFTAR ULANG</td>
    <td width="10">:</td>
    <td width="250">'.$data['tgl_daftarulang'].'</td>
  </tr>
  <tr>
    <td width="100">NOMOR DAFTAR ULANG</td>
    <td width="10">:</td>
    <td width="250">'.$data['no_daftarulang'].'</td>
  </tr>
  <tr>
    <td>NAMA SISWA</td>
    <td>:</td>
    <td>'.$data['nm_siswa'].'</td>
  </tr>
  <tr>
    <td>TEMPAT & TANGGAL LAHIR</td>
    <td>:</td>
    <td>'.$data['tpt_lahir'].' & '.$data['tgl_lahir'].'</td>
  </tr>
   <tr>
    <td>JENIS KELAMIN</td>
    <td>:</td>
    <td>'.$data['jns_kelamin'].'</td>
  </tr>
  <tr>
    <td>NAMA SEKOLAH ASAL</td>
    <td>:</td>
    <td>'.$data['nm_sekolah'].'</td>
  </tr>
  <tr>
    <td>NAMA AYAH</td>
    <td>:</td>
    <td>'.$data['nm_ayah'].'</td>
  </tr>
  <tr>
    <td>NAMA IBU</td>
    <td>:</td>
    <td>'.$data['nm_ibu'].'</td>
  </tr>
  <tr>
    <td>PENGHASILAN ORANGTUA/BULAN</td>
    <td>:</td>
    <td>'.$data['penghasilan_ortu'].'</td>
  </tr>
  <tr>
    <td>ALAMAT ORANGTUA</td>
    <td>:</td>
    <td>'.$data['alamat_ortu'].'</td>
  </tr>
  <tr>
    <td>NAMA WALI</td>
    <td>:</td>
    <td>'.$data['nm_wali'].'</td>
  </tr>
  <tr>
    <td>PEKERJAAN WALI</td>
    <td>:</td>
    <td>'.$data['pekerjaan_wali'].'</td>
  </tr>
  <tr>
    <td>ALAMAT WALI</td>
    <td>:</td>
    <td>'.$data['alamat_wali'].'</td>
  </tr>
</table>';

echo "<div align='justify'><p></p></div>";
?>
<?php
echo '<table width="100%" border="0">
  <tr>
    <td width="200" align="left"><b>Calon Siswa</b></td>
    <td width="100"><b>Medan, '.date("d-m-Y").'</b></td>
  </tr>
  <tr>
    <td rowspan="2"></td>
    <td>KEPALA SEKOLAH SMA GKPI PADANG BULAN MEDAN</td>
  </tr>
  <tr>
    <td><img src="images/tandatangan.png" width="220" height="125"></td>
  </tr>
  <tr>
    <td><b><u>'.$data['nm_siswa'].'</u></b></td>
    <td style="text-transform:uppercase"><b><u>'.$kepsek_1['nama_guru'].'</u></b></td>
  </tr>
  <tr>
    <td>NO. REG : '.$data['nomor_registrasi'].'</td>
    <td>NIP. '.$kepsek_1['nip'].'</td>
  </tr>
</table>';
//echo "<p><br></p>";
//echo "<div align='justify'><p><font color='#FF0000'><b>NOMOR REKENING PANITIA PPDB</b></font></p></div><br>";
//echo "<small><i><font color='#FF0000'>3348-03-0258120-87-9</font></i></small><br>";
//echo "<small><i><font color='#FF0000'>BRI Unit Perumnas Simalingkar</font></i></small><br>";
//echo "<small><i><font color='#FF0000'>An. SMA MULIA PRATAMA MEDAN</font></i></small><br>";
?>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="mhs-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>