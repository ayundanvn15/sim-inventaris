<?php
    $nama_sarana = $_GET['nama_sarana'];
    $jumlah = $_GET['jumlah'];
    $tglk = $_GET['tgl_keluar'];
    $ket = $_GET['keterangan'];

    include ('../../../conn/config.php');    
    $x =mysqli_query($koneksi, "SELECT * FROM tb_sarana WHERE id_sarana='$nama_sarana'");
    $y   =mysqli_fetch_array($x);
    $z   =$y['jumlah_sarana'];
    //menghitung jumlah sarana
    $total    =$z-$jumlah;
    
    if ($z < $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-keluar-sarana';
        </script>
        <?php
    }
    //proses    
    else
        $insert =mysqli_query($koneksi, "INSERT INTO tb_keluarsarana (id_sarana, jumlah, tgl_keluar, keterangan) VALUES ('$nama_sarana', '$jumlah', '$tglk', '$ket')");
            if($insert){
                //update sarana
                $upstok= mysqli_query($koneksi, "UPDATE tb_sarana SET jumlah_sarana='$total' WHERE id_sarana='$nama_sarana'");
                ?>
                <script language="JavaScript">
                    alert('Good! Data input successful');
                    document.location='../../index.php?page=data-keluar-sarana';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    
?>