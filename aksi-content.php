<?php
include ('../koneksi.php');
if ($_POST['update']){
$id_content=$_POST['id_content'];
$judul_content=$_POST['judul_content'];
$isi_content=$_POST['isi_content'];
$status_content=$_POST['status_content'];
$ubah = mysql_query("UPDATE content SET id_content='$id_content', judul_content='$judul_content', isi_content='$isi_content', status_content='$status_content' where id_content='$id_content'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data content website berhasil di ubah !');
			document.location='index.php?page=2';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$id_content = $_GET['hapus'];
$del="DELETE FROM berita where id_content='$id_content'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data berhasil di hapus !');
			document.location='index.php?page=2';
		</script><?php
		}
}
header("location:index.php?page=2");
?>