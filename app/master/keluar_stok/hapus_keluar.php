<?php
include('../../../conn/config.php');
$id = $_GET['id_keluarstok'];


$query = mysqli_query($koneksi,"DELETE FROM tb_keluarstok WHERE id_keluarstok='$id'");

echo "<script>alert('Delete Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-keluar-stok'>"; 

?>