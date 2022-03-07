<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Proses Tambah Produk</title>
  </head>
  <body>

  <?php

if($_POST){
    
    if(empty($_POST['nama_produk'])){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($_POST['deskripsi'])){
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } elseif(empty($_POST['harga'])){
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    } else {
        include "cekkoneksi.php";

        // upload image
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
            if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                echo "The file " .htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " has been uploaded.";
                
                $insert=mysqli_query($conn,"insert into produk (nama_produk, deskripsi, harga, foto_produk) value ('".$_POST['nama_produk']."','".$_POST['deskripsi']."','".$_POST['harga']."','".basename($_FILES["foto_produk"]["name"])."')")or die(mysqli_error($conn));
                if($insert == !false){
                    echo "<script>alert('Sukses menambahkan produk');location.href='tambahproduk.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan produk');location.href='tambahproduk.php';</script>";
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
