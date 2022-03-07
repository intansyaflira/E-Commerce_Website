<?php 

    if($_POST){

        $username_petugas=$_POST['username_petugas'];

        $password_petugas=$_POST['password_petugas'];

        if(empty($username_petugas)){

            echo "<script>alert('Username tidak boleh kosong');location.href='loginpetugas.php';</script>";

        } elseif(empty($password_petugas)){

            echo "<script>alert('Password tidak boleh kosong');location.href='loginpetugas.php';</script>";

        } else {

            include "cekkoneksi.php";

            $qry_loginpetugas=mysqli_query($conn,"select * from petugas where username = '".$username_petugas."' and password = '".md5($password_petugas)."'");

            if(mysqli_num_rows($qry_loginpetugas)>0){

                $dt_loginpetugas=mysqli_fetch_array($qry_loginpetugas);

                session_start();

                $_SESSION['id_petugas']=$dt_loginpetugas['id_petugas'];

                $_SESSION['nama_petugas']=$dt_loginpetugas['nama_petugas'];

                $_SESSION['status_login']=true;

                header("location: homepetugas.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='loginpetugas.php';</script>";

            }

        }

    }

?>