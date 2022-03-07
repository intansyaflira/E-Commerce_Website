<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];
    
        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='loginpelanggan.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='loginpelanggan.php';</script>";

        } else {

            include "cekkoneksi.php";

            $qry_loginpelanggan=mysqli_query($conn,"select * from pelanggan where username = '".$username."' AND password = '".$password."'");

            if(mysqli_num_rows($qry_loginpelanggan)>0){

                $dt_loginpelanggan=mysqli_fetch_array($qry_loginpelanggan);

                session_start();

                $_SESSION['id_pelanggan']=$dt_loginpelanggan['id_pelanggan'];

                $_SESSION['nama']=$dt_loginpelanggan['nama'];

                $_SESSION['status_login']=true;

                header("location: homepelanggan.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='loginpelanggan.php';</script>";

            }

        }

    }

?>