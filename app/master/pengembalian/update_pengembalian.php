<?php
include('../../../conn/config.php');
$id = $_GET['id_pengembalian'];
$nama_sarana = $_GET['id_sarana'];
$nama = $_GET['nama'];
$ktp = $_GET['no_ktp'];
$jumlah = $_GET['jml_pengembalian'];
$tglk = $_GET['tgl_kembali'];

$query = mysqli_query($koneksi,"UPDATE tb_pengembalian SET id_sarana='$nama_sarana', nama='$nama', no_ktp='$ktp', jml_pengembalian='$jumlah', tgl_kembali='$tglk' WHERE id_peminjaman='$id'");

echo "<script>alert('Data Edit Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-pengembalian'>"; 

?>