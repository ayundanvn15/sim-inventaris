<?php
    $tglm = $_GET['tgl_masuk'];
    $nama_stok = $_GET['nama'];
    $jumlah = $_GET['jumlah'];
    $harga = $_GET['harga_satuan'];
    $total_harga = $_GET['total'];
    
    include ('../../../conn/config.php');    
    $selSto =mysqli_query($koneksi, "SELECT * FROM tb_stok WHERE id_stok='$nama_stok'");
    $sto    =mysqli_fetch_array($selSto);
    $stok    =$sto['jumlah_stok'];
    //menghitung jumlah stok
    $total    =$stok+$jumlah;
    
    if ($stok > $jumlah) {
        ?>
        <script language="JavaScript">
            alert('Oops! theres a problem');
            document.location='../../index.php?page=data-masuk-stok';
        </script>
        <?php
    }
    //proses    
    else{
        $insert =mysqli_query($koneksi, "INSERT INTO tb_masukstok (tgl_masuk, id_stok, jumlah, harga_satuan, total) VALUES ('$tglm', '$nama_stok', '$jumlah', '$harga', '$total_harga')");
            if($insert){
                //update stok
                $upstok= mysqli_query($koneksi, "UPDATE tb_stok SET jumlah_stok='$total' WHERE id_stok='$nama_stok'");
                ?>
                <script language="JavaScript">
                    alert('Good! Data input successful');
                    document.location='../../index.php?page=data-masuk-stok';
                </script>
                <?php
            }
            else {
                echo "<div><b>Oops!</b> 404 Error Server.</div>";
            }
    }
?>