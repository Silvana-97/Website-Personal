<?php
$username=$_POST['username'];
$password=$_POST['password'];

if ($username == "" || $password == "")
{
   echo"<script>alert('Maaf, userid atau password anda masih kosong',document.location.href='javascript:history.back(0)')</script>";
}
else
{
include("../koneksi.php");
$password = md5($password);
$sql="select * from admin where (username = '".$_POST['username']."') and (password = '$password')";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
if($row[username]==$username and $row[password]==$password)
{
session_start();
session_register("username");
session_register("password");
session_register("level");
session_register("status");
$username		=$row[username];
$password		=$row[password];
$level			=$row[level];
$status			=$row[status];
{header("location:index.php");
}}
else
{
 echo"<script>alert('Maaf, User ID dan Password anda salah silahkan login kembali dengan benar',document.location.href='javascript:history.back(0)')</script>";
}}
?>