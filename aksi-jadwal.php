<?php
include ('../koneksi.php');
$kd_jadwal=$_POST['kd_jadwal'];
$kategori=$_POST['kategori'];
$kd_jenisbeasiswa=$_POST['kd_jenisbeasiswa'];
$tgl_pelaksanaan=$_POST['tgl_pelaksanaan'];
$judul_jadwal=$_POST['judul_jadwal'];
$isi_jadwal=$_POST['isi_jadwal'];
$status_jadwal=$_POST['status_jadwal'];
if (isset($_POST['tambah'])){
$query="INSERT INTO jadwal (kd_jadwal,kategori,kd_jenisbeasiswa,tgl_pelaksanaan,judul_jadwal,isi_jadwal,status_jadwal) values ('$kd_jadwal','$kategori','$kd_jenisbeasiswa','$tgl_pelaksanaan','$judul_jadwal','$isi_jadwal','$status_jadwal')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data  berhasil di simpan !');
			document.location='index.php?page=4';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE jadwal SET kd_jadwal='$kd_jadwal', kategori='$kategori', kd_jenisbeasiswa='$kd_jenisbeasiswa', tgl_pelaksanaan='$tgl_pelaksanaan', judul_jadwal='$judul_jadwal', isi_jadwal='$isi_jadwal', status_jadwal='$status_jadwal' where kd_jadwal='$kd_jadwal'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data  berhasil di ubah !');
			document.location='index.php?page=4';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_jadwal = $_GET['hapus'];
$del="DELETE FROM jadwal where kd_jadwal='$kd_jadwal'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=4';
		</script><?php
		}
}
header("location:index.php?page=4");
?>