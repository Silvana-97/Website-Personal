<?php
include ('../koneksi.php');
$kd_penerima=$_POST['kd_penerima'];
$tgl_pengesahan=$_POST['tgl_pengesahan'];
$kd_seleksiujian=$_POST['kd_seleksiujian'];
$kd_tahunakademik=$_POST['kd_tahunakademik'];
if (isset($_POST['tambah'])){
$query="INSERT INTO penerima (kd_penerima,tgl_pengesahan,kd_seleksiujian,kd_tahunakademik) values ('$kd_penerima','$tgl_pengesahan','$kd_seleksiujian','$kd_tahunakademik')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data berhasil di simpan !');
			document.location='index.php?page=13';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE penerima SET kd_penerima='$kd_penerima', tgl_pengesahan='$tgl_pengesahan', kd_seleksiujian='$kd_seleksiujian', kd_tahunakademik='$kd_tahunakademik' where kd_penerima='$kd_penerima'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data berhasil di ubah !');
			document.location='index.php?page=13';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_penerima = $_GET['hapus'];
$del="DELETE FROM penerima where kd_penerima='$kd_penerima'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=13';
		</script><?php
		}
}
header("location:index.php?page=13");
?>