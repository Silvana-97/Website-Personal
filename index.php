<?php
session_start();
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$hak_akses = $_SESSION['hak_akses'];
if(!isset($_SESSION['username'])) {
header("location:index.php?page=home");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>
ADMINISTRATOR BEASISWA || AMIK MBP MEDAN
</title>
<link rel="shortcut icon" href="../images/logo_amikmbp.gif">
<link rel="stylesheet" href="js/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/dataTables.bootstrap.css"/>
<link rel="stylesheet" href="css/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="css/daterangepicker.css">
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
    $( "#input" ).datepicker({
        changeMonth: true,
        changeYear: true
    });
    });
</script>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
<script src="assets/js/ace-extra.min.js"></script>
</head>
<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar"></button>
		<div class="navbar-header pull-left">
			<a href="?" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					Sistem Informasi Beasiswa Pada AMIK MBP Medan
				</small>
			</a>
		</div>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="../loginadmin/images/icon__admin.jpg" alt="Administrator SIAKAD" />
						<span class="user-info">
							<small>ADMINISTRATOR BEASISWA, </small>
							<?php echo "Hai, Admin ". $_SESSION['username']; ?>
						</span>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li><a href="?page=1"> <i class="ace-icon fa fa-cog"></i> Setting Admin</a> </li>
						<li class="divider"></li>
						<li><a href="keluar.php"><i class="ace-icon fa fa-power-off"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript"> try{ace.settings.loadState('main-container')}catch(e){} </script>
	<div id="sidebar" class="sidebar responsive  ace-save-state">
	<script type="text/javascript"> try{ace.settings.loadState('sidebar')}catch(e){} </script>
		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-success"> <i class="ace-icon fa fa-signal"></i> </button>
				<button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
				<button class="btn btn-warning"><i class="ace-icon fa fa-users"></i></button>
				<button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
			</div>
			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>
				<span class="btn btn-info"></span>
				<span class="btn btn-warning"></span>
				<span class="btn btn-danger"></span>
			</div>
		</div>
		<ul class="nav nav-list">
			<li class="active"><a href="?page=home"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard </span></a><b class="arrow"></b></li>
			<li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-desktop"></i><span class="menu-text">Master Data</span><b class="arrow fa fa-angle-down"></b></a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class=""><a href="?page=2"><i class="menu-icon fa fa-caret-right"></i>Content Website</a><b class="arrow"></b></li>
                    <li class=""><a href="?page=5"><i class="menu-icon fa fa-caret-right"></i>Content Beasiswa</a><b class="arrow"></b></li>
					<li class=""><a href="?page=3"><i class="menu-icon fa fa-caret-right"></i>Berita</a><b class="arrow"></b></li>
                    <li class=""><a href="?page=7"><i class="menu-icon fa fa-caret-right"></i>Tahun Akademik</a><b class="arrow"></b></li>
				</ul>
			</li>
			<li class=""><a href="?page=4"><i class="menu-icon fa fa-pencil-square-o"></i><span class="menu-text"> Data Jadwal</span></a><b class="arrow"></b></li>
            <li class=""><a href="?page=6"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text"> Data Jenis Beasiswa</span></a><b class="arrow"></b></li>
            <li class=""><a href="?page=8"><i class="menu-icon fa fa-scissors"></i><span class="menu-text"> Data Pendaftar</span></a><b class="arrow"></b></li>
            <li class=""><a href="?page=10"><i class="menu-icon fa fa-terminal"></i><span class="menu-text"> Data Permohonan</span></a><b class="arrow"></b></li>
            <li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-list"></i><span class="menu-text"> Data Seleksi</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
				<ul class="submenu">
					<li class=""><a href="?page=9"><i class="menu-icon fa fa-caret-right"></i>Hasil Seleksi Berkas</a><b class="arrow"></b></li>
					<li class=""><a href="?page=11"><i class="menu-icon fa fa-caret-right"></i>Hasil Seleksi Ujian</a><b class="arrow"></b></li>
				</ul>
			</li>
            <li class=""><a href="?page=24"><i class="menu-icon fa fa-pencil-square-o"></i><span class="menu-text"><small>Data Penerima Beasiswa</small></span></a><b class="arrow"></b></li>
            <li class=""><a href="?page=14"><i class="menu-icon fa fa-file-o"></i><span class="menu-text"> Buku Tamu</span></a><b class="arrow"></b></li>
			<li class=""><a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-tag"></i><span class="menu-text"> Laporan</span><b class="arrow fa fa-angle-down"></b></a>
				<b class="arrow"></b>
				<ul class="submenu">
					<li class=""><a href="laporan_pendaftar.php" target="_blank"><i class="menu-icon fa fa-caret-right"></i>Laporan Pendaftar</a><b class="arrow"></b></li>
					<li class=""><a href="?page=15"><i class="menu-icon fa fa-caret-right"></i>Pendaftar Per Jenis Beasiswa</a><b class="arrow"></b></li>
					<li class=""><a href="?page=18"><i class="menu-icon fa fa-caret-right"></i>Permohonan Beasiswa</a><b class="arrow"></b></li>
					<li class=""><a href="?page=19"><i class="menu-icon fa fa-caret-right"></i>Penerima Beasiswa/TA</a><b class="arrow"></b></li>
				</ul>
			</li>
		</ul>
		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
	</div>
	<div class="main-content">
		<div class="main-content-inner">
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>
						Welcome to<strong class="green"> Halaman<small> (BAGIAN AKADEMIK AMIK MBP MEDAN)</small></strong>Sistem Informasi Beasiswa Pada Akademik Manajemen Informatika Medan</div>
						<div class="col-sm-6">  
                        <?php
							$ok=$_REQUEST[page]?$_GET[page]:"admin";
							switch($ok)
							{
								case"admin":default:include("home.php");break;
								case"1":include("input_admin.php");break;
								case"2":include("input_content.php");break;
								case"3":include("input_berita.php");break;
								case"4":include("input_jadwal.php");break;
								case"5":include("input_cpendaftaran.php");break;
								case"6":include("input_jenisbeasiswa.php");break;
								case"7":include("input_tahunajaran.php");break;
								case"8":include("data_daftar.php");break;
								case"brks_pendaftar":include("aktivasi_seleksi_berkas.php");break;
								case"aktvs_pendaftar":include("aktivasi_status_pdftr.php");break;
								case"9":include("data_seleksiberkas.php");break;
								case"10":include("data_permohonan.php");break;
								case"11":include("data_seleksiujian.php");break;
								case"12":include("data_daftarulang.php");break;
								case"13":include("data_siswabaru.php");break;
								case"14":include("data_bukutamu.php");break;
								case"15":include("pendaftar_jenis_beasiswa.php");break;
								case"16":include("hapus_daftar.php");break;
								case"17":include("hapus_tamu.php");break;
								case"18":include("lap_permohonan_per_jenis.php");break;
								case"19":include("lap_penerima_ta.php");break;
								case"20":include("lap_siswa_seleksi.php");break;
								case"21":include("lap_daftarulang.php");break;
								case"22":include("lap_siswabaru.php");break;
								case"23":include("lap_siswabaru_ta_namakelas.php");break;
								case"24":include("data_siswabaru.php");break;
							}		
						?>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
			<span class="blue bolder">
				Sistem Informasi Beasiswa Berbasis Web </span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                 &nbsp; &nbsp; &nbsp; &nbsp;
				Akademik Manajemen Informatika Komputer Medan - All Right Reserved, 
				<script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script>
			</span>
		</div>
	</div>
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"><i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i></a>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<script src="js/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="js/bootstrap-datepicker.js"></script>


<script type="text/javascript">
	$(function() {
	$("#tabel").dataTable();
	});
	
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
	
</script>
<script type="text/javascript">
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
