<?php
session_start();
include("../koneksi.php");
unset($_SESSION[user]);
unset($_SESSION[pass]);
session_destroy();
header("location:../index.php");
?>