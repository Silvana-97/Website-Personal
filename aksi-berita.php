<?php
include ('../koneksi.php');
$no=$_POST['no'];
$tanggal=$_POST['tanggal'];
$kategori=$_POST['kategori'];
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$pengirim=$_POST['pengirim'];
$photo=$_POST['photo'];
$status=$_POST['status'];

//Untuk Menyimpan Pasphoto Admin
$photo=$_FILES[photo][name];
$b=explode(".",$photo);
$satux=$b[1];
$photo="$_POST[kategori]_$_POST[judul].$satux";

if (isset($_POST['tambah'])){
$folderx="img/berita/";
$folder2x=$folderx.basename($photo);
move_uploaded_file($_FILES[photo][tmp_name],$folder2x);

$query="INSERT INTO berita (no,tanggal,kategori,judul,photo,isi,pengirim,status) values ('','$tanggal','$kategori','$judul','$photo','$isi','$pengirim','$status')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query)
{
?><script language="JavaScript">
			alert('Data Berhasil Disimpan');
			document.location='index.php?page=3';
		</script>
<?php
}
}
else if ($_POST['update']){
$no=$_POST['no'];
$tanggal=$_POST['tanggal'];
$kategori=$_POST['kategori'];
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$pengirim=$_POST['pengirim'];
$photo=$_POST['photo'];
$status=$_POST['status'];
if ($_FILES['photo']['size'] != 0){
$filephoto= $_FILES['photo']['name'];
$ubahfile = move_uploaded_file($_FILES['photo']['tmp_name'], 'img/berita/'.$filephoto); 
}
$ubah = mysql_query("UPDATE berita SET no='$no', tanggal='$tanggal', judul='$judul', isi='$isi', pengirim='$pengirim', photo='$filephoto', status='$status' where no='$no'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data Berhasil di Ubah');
			document.location='index.php?page=3';
		</script>
<?php
}
}
else if ($_GET['hapus']){
$no = $_GET['hapus'];
$del="DELETE FROM berita where no='$no'";
$del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data Berhasil Dihapus');
			document.location='index.php?page=3';
		</script><?php
		}
}
header("location:index.php?page=3");
?>