<?php
$koneksi = mysqli_connect('localhost','root', '', 'db_simi');

if(!$koneksi){
	die("Koneksi Gagal:". mysqli_connect_error());
}
else{
	echo "";
}
?>