<?php
include('../../../conn/config.php');
$id = $_GET['id_pengembalian'];


$query = mysqli_query($koneksi,"DELETE FROM tb_pengembalian WHERE id_pengembalian='$id'");

echo "<script>alert('Delete Edit Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-pengembalian'>";

?>