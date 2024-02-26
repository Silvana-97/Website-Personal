<?php
include ('../koneksi.php');
$kd_tahunakademik=$_POST['kd_tahunakademik'];
$tahunakademik=$_POST['tahunakademik'];
if (isset($_POST['tambah'])){
$query="INSERT INTO tahunakademik (kd_tahunakademik,tahunakademik) values ('$kd_tahunakademik','$tahunakademik')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data tahun ajaran berhasil di simpan !');
			document.location='index.php?page=7';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE tahunakademik SET kd_tahunakademik='$kd_tahunakademik', tahunakademik='$tahunakademik' where kd_tahunakademik='$kd_tahunakademik'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data tahun akademik berhasil di ubah !');
			document.location='index.php?page=7';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_tahunakademik = $_GET['hapus'];
$del="DELETE FROM tahunakademik where kd_tahunakademik='$kd_tahunakademik'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=7';
		</script><?php
		}
}
header("location:index.php?page=7");
?>