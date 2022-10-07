<?php
    $nama_stok = $_GET['nama'];
    $jumlah = $_GET['jumlah'];
    $tglm = $_GET['tgl_masuk'];
    $kategori = $_GET['kategori'];
    
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
        $insert =mysqli_query($koneksi, "INSERT INTO tb_masukstok (id_stok, jumlah, tgl_masuk) VALUES ('$nama_stok', '$jumlah', '$tglm')");
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