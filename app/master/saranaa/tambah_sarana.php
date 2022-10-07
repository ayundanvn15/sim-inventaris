<?php
include('../../../conn/config.php');
$nama = $_GET['nama_sarana'];
$merk = $_GET['merk'];
$kondisi = $_GET['kondisi'];
$jumlah = $_GET['jumlah_sarana'];

$insert = mysqli_query($koneksi,"INSERT INTO tb_sarana (id_sarana, nama_sarana, merk,  kondisi, jumlah_sarana) VALUES ('','$nama', '$merk', '$kondisi', '$jumlah')");


echo "<script>alert('Add data successfully!!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-saranaa'>";

