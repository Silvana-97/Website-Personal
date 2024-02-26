<?php
include ('../koneksi.php');
$kd_seleksiujian=$_POST['kd_seleksiujian'];
$tgl_seleksi_ujian=$_POST['tgl_seleksi_ujian'];
$id_permohonan=$_POST['id_permohonan'];
$status_lulus_ujian=$_POST['status_lulus_ujian'];
if (isset($_POST['tambah'])){
$query="INSERT INTO seleksi_ujian (kd_seleksiujian,tgl_seleksi_ujian,id_permohonan,status_lulus_ujian) values ('$kd_seleksiujian','$tgl_seleksi_ujian','$id_permohonan','$status_lulus_ujian')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data seleksi ujian berhasil di simpan !');
			document.location='index.php?page=11';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE seleksi_ujian SET kd_seleksiujian='$kd_seleksiujian', tgl_seleksi_ujian='$tgl_seleksi_ujian', id_permohonan='$id_permohonan', status_lulus_ujian='$status_lulus_ujian' where kd_seleksiujian='$kd_seleksiujian'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data berhasil di ubah !');
			document.location='index.php?page=11';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_seleksiujian = $_GET['hapus'];
$del="DELETE FROM seleksi_ujian where kd_seleksiujian='$kd_seleksiujian'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=11';
		</script><?php
		}
}
header("location:index.php?page=11");
?>