<?php
if($_POST) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_petugas = $_POST['id_petugas'];
    $tgl_transaksi = $_POST['tgl_transaksi'];

    if(empty($id_pelanggan)) {
        echo "<script>alert('id pelanggan tidak boleh kosong');location.href='tambahtransaksi.php';</script>";
    } elseif(empty($id_petugas)) {
        echo "<script>alert('id petugas tidak boleh kosong');location.href='tambahtransaksi.php';</script>";
    } elseif(empty($tgl_transaksi)) {
        echo "<script>alert('tanggal transaksi tidak boleh kosong');location.href='tambahtransaksi.php';</script>";
    } else {
        include "cekkoneksi.php";

        $abc = mysqli_query($conn, "INSERT INTO `transaksi` (`id_pelanggan`, `id_petugas`, `tgl_transaksi`) VALUES ('".$id_pelanggan."', '".$id_petugas."', '".$tgl_transaksi."')");

        if($abc) {
            echo "<script>alert('Sukses menambahkan data transaksi');location.href='tambahtransaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data transaksi');location.href='tambahtransaksi.php';</script>";
        }
    }
}
?>