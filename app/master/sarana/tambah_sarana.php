<?php
include('../../../conn/config.php');
$nama = $_GET['nama_sarana'];
$merk = $_GET['merk'];
$jumlah = $_GET['jumlah_sarana'];
$kondisi = $_GET['kondisi'];
$ket = $_GET['keterangan'];

$insert = mysqli_query($koneksi,"INSERT INTO tb_sarana (id_sarana, nama_sarana, merk, jumlah_sarana, kondisi, keterangan) VALUES ('','$nama', '$merk', '$jumlah', '$kondisi', '$ket')");


echo "<script>alert('Add data successfully!!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-sarana'>";

