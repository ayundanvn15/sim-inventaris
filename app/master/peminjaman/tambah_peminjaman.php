<?php
$nama 			= $_GET['nama'];
$nama_sarana 	= $_GET['nama_sarana'];
$ktp 			= $_GET['no_ktp'];
$jumlah 		= $_GET['jml_peminjaman'];
$tglp 			= $_GET['tgl_pinjam'];
$tglk 			= $_GET['tgl_kembali'];
$keperluan 		= $_GET['keperluan'];

    include ('../../../conn/config.php');    
    $x =mysqli_query($koneksi, "SELECT * FROM tb_peminjaman WHERE id_sarana='$nama_sarana'");
    $y   =mysqli_fetch_array($x);
    $z   =$y['jumlah_sarana'];
    //menghitung jumlah sarana
    $total    =$z-$jumlah;
    
    if ($z < $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-peminjaman';
        </script>
        <?php
    }
    //proses    
    else
        $insert =mysqli_query($koneksi, "INSERT INTO tb_peminjaman (id_sarana, no_ktp, jml_peminjaman, tgl_pinjam, tgl_kembali, keperluan) VALUES ('$nama_sarana', '$ktp', '$jumlah', '$tglp', '$tglk', '$keperluan')");
        	if($insert){
                //update sarana
                $upstok= mysqli_query($koneksi, "UPDATE tb_sarana SET jumlah_sarana='$total' WHERE id_sarana='$nama_sarana'");
                ?>
                <script language="JavaScript">
                    alert('Good! Data input successful');
                    document.location='../../index.php?page=data-peminjaman';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    
?>