<?php
include ('../koneksi.php');
$id_cbeasiswa=$_POST['id_cbeasiswa'];
$kategori_cbeasiswa=$_POST['kategori_cbeasiswa'];
$judul_cbeasiswa=$_POST['judul_cbeasiswa'];
$isi_cbeasiswa=$_POST['isi_cbeasiswa'];
$kd_jenisbeasiswa=$_POST['kd_jenisbeasiswa'];
$status_cbeasiswa=$_POST['status_cbeasiswa'];
if (isset($_POST['tambah'])){
$query="INSERT INTO content_beasiswa (id_cbeasiswa,kategori_cbeasiswa,judul_cbeasiswa,isi_cbeasiswa,kd_jenisbeasiswa,status_cbeasiswa) values ('','$kategori_cbeasiswa','$judul_cbeasiswa','$isi_cbeasiswa','$kd_jenisbeasiswa','$status_cbeasiswa')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data  berhasil di simpan !');
			document.location='index.php?page=5';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE content_beasiswa SET kategori_cbeasiswa='$kategori_cbeasiswa', judul_cbeasiswa='$judul_cbeasiswa', isi_cbeasiswa='$isi_cbeasiswa', kd_jenisbeasiswa='$kd_jenisbeasiswa', status_cbeasiswa='$status_cbeasiswa' where id_cbeasiswa='$id_cbeasiswa'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data  berhasil di ubah !');
			document.location='index.php?page=5';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$id_cbeasiswa = $_GET['hapus'];
$del="DELETE FROM content_beasiswa where id_cbeasiswa='$id_cbeasiswa'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=5';
		</script><?php
		}
}
header("location:index.php?page=5");
?>