<?php
include('../../../conn/config.php');
$id = $_GET['id_masuksarana'];
$nama_sarana = $_GET['nama'];
$merk = $_GET['merk'];
$kemasan = $_GET['kemasan'];
$jumlah = $_GET['jumlah'];
$tglm = $_GET['tgl_masuk'];

$query = mysqli_query($koneksi,"UPDATE tb_masuksarana SET id_sarana='$nama_sarana', merk='$merk', kemasan='$kemasan', jumlah='$jumlah', tgl_masuk='$tglm' WHERE id_masuk='$id'");

echo "<script>alert('Data Edit Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-masuk-sarana'>"; 
?>