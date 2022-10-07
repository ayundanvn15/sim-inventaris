<?php
include('../../../conn/config.php');
$id = $_GET['id_sarana'];
$nama = $_GET['nama_sarana'];
$merk = $_GET['merk'];
$jumlah = $_GET['jumlah_sarana'];
$kondisi = $_GET['kondisi'];
$ket = $_GET['keterangan'];

$query = mysqli_query($koneksi,"UPDATE tb_sarana SET nama_sarana='$nama', merk='$merk', jumlah_sarana='$jumlah', kondisi='$kondisi', keterangan='$ket' WHERE id_sarana='$id'");

echo "<script>alert('Data Edit Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-sarana'>"; 

?>