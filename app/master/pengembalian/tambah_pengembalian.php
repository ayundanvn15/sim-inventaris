<?php
$nama_sarana 	= $_GET['nama_sarana'];
$nama 			= $_GET['nama'];
$ktp 			= $_GET['no_ktp'];
$jumlah 		= $_GET['jml_pengembalian'];
$tglk 			= $_GET['tgl_kembali'];

    include ('../../../conn/config.php');    
    $pengembalian =mysqli_query($koneksi, "SELECT * FROM tb_sarana WHERE id_sarana='$nama_sarana'");
    $pmnb   =mysqli_fetch_array($pengembalian);
    $pmb   =$pmnb['jumlah_sarana'];
    //menghitung jumlah sarana
    $total    =$pmb+$jumlah;
    
    if ($pmb < $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-pengembalian';
        </script>
        <?php
    }
    //proses    
    else
        $insert =mysqli_query($koneksi, "INSERT INTO tb_pengembalian (id_sarana, nama, no_ktp, jml_pengembalian, tgl_kembali) VALUES ('$nama_sarana', '$nama', '$ktp', '$jumlah', '$tglk')");
        	if($insert){
                //update sarana
                $upstok= mysqli_query($koneksi, "UPDATE tb_sarana SET jumlah_sarana='$total' WHERE id_sarana='$nama_sarana'");
                ?>
                <script language="JavaScript">
                    alert('Good! Data input successful');
                    document.location='../../index.php?page=data-pengembalian';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    
?>