<?php

if($_POST){
    
    if(empty($_POST['nama'])){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    } elseif(empty($_POST['alamat'])){
        echo "<script>alert('alamat pelanggan tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    } elseif(empty($_POST['telp'])){
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    } elseif(empty($_POST['username'])){
        echo "<script>alert('username tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    } elseif(empty($_POST['password'])){
        echo "<script>alert('password tidak boleh kosong');location.href='tambahpelanggan.php';</script>";
    } else {
        include "cekkoneksi.php";

        //upload file
        $target_dir = "foto_pelanggan/";
        $target_file = $target_dir . basename($_FILES["foto_pelanggan"]["name"]);
        $updateOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $updateOk = 0;
        }
        
        // Check if $updateOk is set to 0 by an error
        if ($updateOk == 0) {
            echo "Sorry, your file was not updated.";
            
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto_pelanggan"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["foto_pelanggan"]["name"])). " has been uploaded.";
                
                $update = mysqli_query($conn,"UPDATE `pelanggan` SET `nama` = '".$_POST['nama']."', `alamat` = '".$_POST['alamat']."', 
                `telp` = '".$_POST['telp']."', `username` = '".$_POST['username']."', `password` = '".$_POST['password']."',
                `foto_pelanggan` = '".basename($_FILES["foto_pelanggan"]["name"])."' WHERE `pelanggan`.`id_pelanggan` = '".$_POST['id_pelanggan']."';") or die(mysqli_error($conn));
                
                if($update){
                    echo "<script>alert('Sukses update pelanggan');location.href='tampilpelanggan.php';</script>";
                } else {
                    echo "<script>alert('Gagal update pelanggan');location.href='ubahpelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
                }
            }
        }
    }
}
?>