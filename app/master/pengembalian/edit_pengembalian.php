<?php
$id = $_GET['id_pengembalian'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian");
$view = mysqli_fetch_array($query);


 ?>
 <section class="content">
    <div class="container-fluid">
      <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pengembalian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="get" action="master/pengembalian/update_pengembalian.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Barang" name="nama_sarana" required>>
                            <option value="">--Pilih--</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_sarana");
                              while ($pmnj = mysqli_fetch_array($query)) {
                              
                              ?>
                            <option value="<?php echo $pmnj['id_sarana']; ?>"><?php echo $pmnj['nama_sarana']; ?></option>

                            <?php }?>
                        </select>
                      </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama Pengembali</label>
                        <input type="text" class="form-control" placeholder="Nama Pengembali" name='nama' value="<?php echo $view['nama'];?>">
                      </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" class="form-control" placeholder="No KTP" name='no_ktp' value="<?php echo $view['no_ktp'];?>">
                      </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" placeholder="Jumlah" name='jml_pengembalian' value="<?php echo $view['jml_pengembalian'];?>">
                      </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" class="form-control" placeholder="Tanggal Pengembalian" name='tgl_kembali' value="<?php echo $view['tgl_kembali'];?>">
                      </div>
                    </div>
                   </div>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button> 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                  <button type="submit" class="btn btn-sm btn-info">Save</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
  </div>
</section>