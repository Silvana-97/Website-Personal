<?php
include("../koneksi.php");
if (isset($_GET[hapus]))
{
	mysql_query("delete from pendaftaran where npm='$_GET[npm]'");
	echo"<script language='JavaScript'>
			alert('Data berhasil di hapus !');
			document.location='index.php?page=8';
		</script>";
}
else{}
?>