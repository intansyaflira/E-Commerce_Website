<?php 

    session_start();

    include "cekkoneksi.php";

    $cart=@$_SESSION['cart'];

    if(count($cart)>0){

        $id_petugas = 23;

        $tgl=date('Y-m-d');

        mysqli_query($conn,"INSERT INTO `transaksi` (`id_pelanggan`, `id_petugas`, `tgl_transaksi`) VALUES ('".$_SESSION['id_pelanggan']."','23','".$tgl."')
        ");

         $id=mysqli_insert_id($conn);

        foreach ($cart as $key_produk => $val_produk) {

            mysqli_query($conn,"insert into detail_transaksi (id_transaksi,id_produk,qty,subtotal) value('".$id."','".$val_produk['id_produk']."','".$val_produk['qty']."','".$val_produk['subtotal']."')");

        }

        unset($_SESSION['cart']);

        echo '<script>alert("Anda berhasil membeli produk");location.href="histori_pembelian.php"</script>';

    }

?>