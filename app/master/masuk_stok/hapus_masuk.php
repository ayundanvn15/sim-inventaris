<?php
include('../../../conn/config.php');
$id = $_GET['id_masukstok'];


$query = mysqli_query($koneksi,"DELETE FROM tb_masukstok WHERE id_masukstok='$id'");

echo "<script>alert('Delete Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-masuk-stok'>"; 

?>