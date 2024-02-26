<?php
include("../koneksi.php");
if (isset($_GET[hapus]))
{
	mysql_query("delete from kontakkami where id='$_GET[id]'");
	echo"<script language='JavaScript'>
			alert('Data berhasil di hapus !');
			document.location='index.php?page=14';
		</script>";
}
else{}
?>