<?php
include("../koneksi.php");
if (isset($_GET[hapus]))
{
	mysql_query("delete from permohonan where id_permohonan='$_GET[id_permohonan]'");
	echo"<script language='JavaScript'>
			alert('Data berhasil di hapus !');
			document.location='index.php?page=10';
		</script>";
}
else{}
?>