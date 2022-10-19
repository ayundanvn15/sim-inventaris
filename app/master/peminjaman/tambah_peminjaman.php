<?php
$nama_sarana 	= $_GET['nama_sarana'];
$nama 			= $_GET['nama'];
$ktp 			= $_GET['no_ktp'];
$jumlah 		= $_GET['jml_peminjaman'];
$tglp 			= $_GET['tgl_pinjam'];
$tglk 			= $_GET['tgl_kembali'];
$keperluan 		= $_GET['keperluan'];

    include ('../../../conn/config.php');    
    $peminjaman =mysqli_query($koneksi, "SELECT * FROM tb_sarana WHERE id_sarana='$nama_sarana'");
    $pmnj   =mysqli_fetch_array($peminjaman);
    $pmj   =$pmnj['jumlah_sarana'];
    //menghitung jumlah sarana
    $total    =$pmj-$jumlah;
    
    if ($pmj < $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-peminjaman';
        </script>
        <?php
    }
    //proses    
    else
        $insert =mysqli_query($koneksi, "INSERT INTO tb_peminjaman (id_sarana, nama, no_ktp, jml_peminjaman, tgl_pinjam, tgl_kembali, keperluan) VALUES ('$nama_sarana', '$nama', '$ktp', '$jumlah', '$tglp', '$tglk', '$keperluan')");
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