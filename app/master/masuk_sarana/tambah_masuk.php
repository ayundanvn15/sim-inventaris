<?php
    $tglm = $_GET['tgl_masuk'];
    $nama_sarana = $_GET['nama_sarana'];
    $jumlah = $_GET['jumlah'];
    $harga = $_GET['harga_satuan'];
    $total = $_GET['total'];

    
    include ('../../../conn/config.php');    
    $selSar =mysqli_query($koneksi, "SELECT * FROM tb_sarana WHERE id_sarana='$nama_sarana'");
    $srn    =mysqli_fetch_array($selSar);
    $sarana    =$srn['jumlah_sarana'];
    //menghitung jumlah sarana
    $total    =$sarana+$jumlah;
    
    if ($sarana > $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-masuk-sarana';
        </script>
        <?php
    }
    //proses    
    else{
        $insert =mysqli_query($koneksi, "INSERT INTO tb_masuksarana (tgl_masuk, id_sarana, jumlah, harga_satuan, total) VALUES ('$tglm', '$nama_sarana', '$jumlah', '$harga', '$total')");
            if($insert){
                //update sarana
                $upstok= mysqli_query($koneksi, "UPDATE tb_sarana SET jumlah_sarana='$total' WHERE id_sarana='$nama_sarana'");
                ?>
                <script language="JavaScript">
                    alert('Good! Data input successful');
                    document.location='../../index.php?page=data-masuk-sarana';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    }
?>