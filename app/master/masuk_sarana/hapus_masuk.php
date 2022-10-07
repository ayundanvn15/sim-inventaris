<?php
include('../../../conn/config.php');
$id = $_GET['id_masuksarana'];


$query = mysqli_query($koneksi,"DELETE FROM tb_masuksarana WHERE id_masuksarana='$id'");

echo "<script>alert('Delete Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-masuk-sarana'>"; 

?>