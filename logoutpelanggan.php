<?php
session_start();
unset($_SESSION['id_pelanggan']);
unset($_SESSION['nama']);
$_SESSION['status_login']=false;
session_destroy();
header("location: homepelanggan.php");
?>