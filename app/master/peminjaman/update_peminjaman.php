<?php
include('../../../conn/config.php');
$id = $_GET['id_peminjaman'];
$nama_sarana = $_GET['id_sarana'];
$nama = $_GET['nama'];
$ktp = $_GET['no_ktp'];
$jumlah = $_GET['jml_peminjaman'];
$tglp = $_GET['tgl_pinjam'];
$keperluan = $_GET['keperluan'];

$query = mysqli_query($koneksi,"UPDATE tb_peminjaman SET id_sarana='$nama_sarana', nama='$nama', no_ktp='$ktp', jml_peminjaman='$jumlah', tgl_pinjam='$tglp', keperluan='$keperluan'WHERE id_peminjaman='$id'");

echo "<script>alert('Data Edit Succeeded!')</script>";
echo "<meta http-equiv='refresh' content='1 url=../../index.php?page=data-peminjaman'>"; 

?>