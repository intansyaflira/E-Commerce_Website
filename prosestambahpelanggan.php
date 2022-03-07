<?php

if($_POST){
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $username=$_POST['username'];
    $password=$_POST['password'];



    if(empty($nama)){
        echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    }elseif(empty($alamat)){
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    }elseif(empty($telp)){
        echo "<script>alert('telp tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    }elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    }elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    }else {

        include "cekkoneksi.php";
        //upload file
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["foto_pelanggan"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto_pelanggan"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto_pelanggan"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["foto_pelanggan"]["name"])). " has been uploaded.";

                $insert=mysqli_query($conn,"INSERT INTO `pelanggan` VALUES (NULL, '".$_POST['nama']."', '".$_POST['alamat']."', '".$_POST['telp']."', '".$_POST['username']."', '".$_POST['password']."', '".basename($_FILES["foto_pelanggan"]["name"])."')")or die(mysqli_error($conn));
                if($insert == !false){
                    echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambahpelanggan.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambahpelanggan.php';</script>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
} else {
    echo "404 not found";
}

?>