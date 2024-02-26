<?php
include ('../koneksi.php');
$id=$_POST['id'];
$username=$_POST['username'];
$password=md5($_POST['password']);

if ($_POST['tambah']){
$query="INSERT INTO admin (id,username,password) values('','$username','$password')"or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=1';
		</script><?php
		}	
}
else if ($_POST['update']){
$ubah = mysql_query("UPDATE admin SET username='$username',password='$password' where id='$id'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data Berhasil di Ubah');
			document.location='index.php?page=1';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$pengguna = $_GET['hapus'];
$del="DELETE FROM admin where username='$pengguna'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data Berhasil Dihapus');
			document.location='index.php?page=1';
		</script><?php
		}
}
header("location:index.php?page=2");
?>