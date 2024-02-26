<?php
include ('../koneksi.php');
$kd_jenisbeasiswa=$_POST['kd_jenisbeasiswa'];
$nm_jenisbeasiswa=$_POST['nm_jenisbeasiswa'];
$kuota=$_POST['kuota'];
$jlh_beasiswa=$_POST['jlh_beasiswa'];
$deskripsi_beasiswa=$_POST['deskripsi_beasiswa'];
$status_jenisbeasiswa=$_POST['status_jenisbeasiswa'];
if (isset($_POST['tambah'])){
$query="INSERT INTO jenis_beasiswa (kd_jenisbeasiswa,nm_jenisbeasiswa,kuota,jlh_beasiswa,deskripsi_beasiswa,status_jenisbeasiswa) values ('$kd_jenisbeasiswa','$nm_jenisbeasiswa','$kuota','$jlh_beasiswa','$deskripsi_beasiswa','$status_jenisbeasiswa')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data jenis beasiswa berhasil di simpan !');
			document.location='index.php?page=6';
		</script><?php
	}
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE jenis_beasiswa SET kd_jenisbeasiswa='$kd_jenisbeasiswa', nm_jenisbeasiswa='$nm_jenisbeasiswa', kuota='$kuota', jlh_beasiswa='$jlh_beasiswa', deskripsi_beasiswa='$deskripsi_beasiswa', status_jenisbeasiswa='$status_jenisbeasiswa' where kd_jenisbeasiswa='$kd_jenisbeasiswa'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data jenis beasiswa berhasil di ubah !');
			document.location='index.php?page=6';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$kd_jenisbeasiswa = $_GET['hapus'];
$del="DELETE FROM jenis_beasiswa where kd_jenisbeasiswa='$kd_jenisbeasiswa'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=6';
		</script><?php
		}
}
header("location:index.php?page=6");
?>