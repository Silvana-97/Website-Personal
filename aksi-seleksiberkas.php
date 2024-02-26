<?php
include ('../koneksi.php');
$kd_seleksiberkas=$_POST['kd_seleksiberkas'];
$tgl_seleksi=$_POST['tgl_seleksi'];
$npm=$_POST['npm'];
$status_lulus_berkas=$_POST['status_lulus_berkas'];
if (isset($_POST['tambah'])){
$query="INSERT INTO seleksi_berkas (kd_seleksiberkas,tgl_seleksi,npm,status_lulus_berkas) values ('$kd_seleksiberkas','$tgl_seleksi','$npm','$status_lulus_berkas')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data seleksi berkas berhasil di simpan !');
			document.location='index.php?page=9';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE seleksi_berkas SET kd_seleksiberkas='$kd_seleksiberkas', tgl_seleksi='$tgl_seleksi', npm='$npm', status_lulus_berkas='$status_lulus_berkas' where kd_seleksiberkas='$kd_seleksiberkas'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data berhasil di ubah !');
			document.location='index.php?page=9';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_seleksiberkas = $_GET['hapus'];
$del="DELETE FROM seleksi_berkas where kd_seleksiberkas='$kd_seleksiberkas'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=9';
		</script><?php
		}
}
header("location:index.php?page=9");
?>