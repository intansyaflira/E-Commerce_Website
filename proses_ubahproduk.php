<?php
    if($_POST){

        $id_produk=$_POST['id_produk'];
        $nama_produk=$_POST['nama_produk'];
        $deskripsi=$_POST['deskripsi'];
        $harga=$_POST['harga'];

        if(empty($nama_produk)){
            echo "<script>alert('nama produk tidak boleh kosong');location.href='tambahproduk.php';</script>";
        } elseif(empty($deskripsi)){
            echo "<script>alert('Deskripsi tidak boleh kosong');location.href='tambahproduk.php';</script>";
        }elseif(empty($harga)){
            echo "<script>alert('harga tidak boleh kosong');location.href='tambahproduk.php';</script>";
        } else {
            include "cekkoneksi.php";
        
            //upload file
            $target_dir = "foto/";
            $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
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
                if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " has been uploaded.";
                    
                    $update = mysqli_query($conn,"UPDATE `produk` SET `nama_produk` = '".$nama_produk."', `deskripsi` = '".$deskripsi."', `harga` = '".$harga."', `foto_produk` = '".basename($_FILES["foto_produk"]["name"])."' WHERE `produk`.`id_produk` = '".$id_produk."';") or die(mysqli_error($conn));
                    
                    if($update){
                        echo "<script>alert('Sukses update produk');location.href='tampilproduk.php';</script>";
                    } else {
                        echo "<script>alert('Gagal update produk');location.href='ubahproduk.php?id_produk=".$id_produk."';</script>";
                    }
                }
            }
        }
    }
?>