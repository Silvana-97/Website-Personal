<?php
include ('../koneksi.php');
$nip=$_POST['nip'];
$nama_guru=$_POST['nama_guru'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$nomor_telpon=$_POST['nomor_telpon'];
$golongan=$_POST['golongan'];
$jabatan=$_POST['jabatan'];
$pendidikan_terakhir=$_POST['pendidikan_terakhir'];
$jurusan_terakhir=$_POST['jurusan_terakhir'];
$tahun_tamat=$_POST['tahun_tamat'];
$photo=$_POST['photo'];
if (isset($_POST['tambah'])){
if ($_FILES['photo']['size'] != 0){
$photo= $_FILES['photo']['name'];
$movefile = move_uploaded_file($_FILES['photo']['tmp_name'], 'img/guru/'.$photo); 
}
$query="INSERT INTO tb_guru (nip,nama_guru,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,alamat,nomor_telpon,golongan,jabatan,pendidikan_terakhir,jurusan_terakhir,tahun_tamat,photo) values ('$nip','$nama_guru','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$nomor_telpon','$golongan','$jabatan','$pendidikan_terakhir','$jurusan_terakhir','$tahun_tamat','$photo')" or die(mysql_error());
$tambah=mysql_query($query);			
	if($query){
			?><script language="JavaScript">
			alert('Data guru berhasil di simpan !');
			document.location='index.php?page=4';
		</script><?php
		}	
}
else if ($_POST['update']){
$nip=$_POST['nip'];
$nama_guru=$_POST['nama_guru'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$alamat=$_POST['alamat'];
$nomor_telpon=$_POST['nomor_telpon'];
$golongan=$_POST['golongan'];
$jabatan=$_POST['jabatan'];
$pendidikan_terakhir=$_POST['pendidikan_terakhir'];
$jurusan_terakhir=$_POST['jurusan_terakhir'];
$tahun_tamat=$_POST['tahun_tamat'];
$photo=$_POST['photo'];
if ($_FILES['photo']['size'] != 0){
$photo= $_FILES['photo']['name'];
$ubahfile = move_uploaded_file($_FILES['photo']['tmp_name'], 'img/guru/'.$photo); 
}
$ubah = mysql_query("UPDATE tb_guru SET nip='$nip', nama_guru='$nama_guru', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', nomor_telpon='$nomor_telpon', golongan='$golongan', jabatan='$jabatan', pendidikan_terakhir='$pendidikan_terakhir', jurusan_terakhir='$jurusan_terakhir', tahun_tamat='$tahun_tamat', photo='$photo' where nip='$nip'")or die(mysql_error());
if($ubah){		
?>
			<script language="JavaScript">
			alert('Data guru berhasil di ubah !');
			document.location='index.php?page=4';
		</script>
<?php
		}
}
else if ($_GET['hapus']){
$nip = $_GET['hapus'];
$del="DELETE FROM tb_guru where nip='$nip'";
  $del= mysql_query($del);
if($del){
			?><script language="JavaScript">
			alert('Data guru berhasil di hapus !');
			document.location='index.php?page=4';
		</script><?php
		}
}
header("location:index.php?page=4");
?>