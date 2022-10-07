    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Keluar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Add Data
                </button>
                <br>
                <div class="row mt-4">
                  <div class="col">
                    <form method="post" class="form-inline">
                      <input type="date" name="tgl_mulai" class="form-control">
                      <input type="date" name="tgl_selesai" class="form-control ml-3">
                      <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                  </div>
              </br>
              </div>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                    <th>Keterangan</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_keluarstok
                      INNER JOIN tb_stok ON tb_keluarstok.id_stok = tb_stok.id_stok");
                    while ($klr = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td width="2%"><?php echo $no?></td>
                    <td><?php echo $klr['nama'];?></td>
                    <td><?php echo $klr['jumlah'];?></td>
                    <td><?php echo $klr['tgl_keluar'];?></td>
                    <td><?php echo $klr['keterangan'];?></td>
                    
                  </tr>
                  <?php }?>
                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Data Keluar</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="get" action="master/keluar_stok/tambah_keluar.php">
            <div class="modal-body">
              <div class="form-group">
                <label for="formGroupExempleInput2">Nama Barang</label>
                <select type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Barang" name="nama" required>>
                  <option value="">--Pilih--</option>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_stok");
                    while ($klr = mysqli_fetch_array($query)) {
                    
                    ?>
                  <option value="<?php echo $klr['id_stok']; ?>"><?php echo $klr['nama']; ?></option>

                  <?php
                      }
                  ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput3">Jumlah</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Jumlah" name="jumlah" required>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput4">Tanggal Keluar</label>
                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Tanggal Keluar" name="tgl_keluar" required>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput4">Kategori</label>
                <select class="form-control" id="exampleFormControlSelect1" name="level">
                  <option>--Pilih--</option>
                  <option>Stok</option>
                  <option>Sarana</option>
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput4">Keterangan</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Keterangan" name="keterangan" required>
              </div>
              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
          </div> 
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>
  function hapus_keluar(data_id){
    //alert('ok');
    //window.location=("master/keluar_stok/hapus_keluar.php?id_keluar="+data_id);
    Swal.fire({
      title: 'Do you want to delete?',
      //showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'YES',
      confirmButtonColor: '#DC143C',
      //denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("master/keluar_stok/hapus_keluar.php?id_keluar="+data_id);
      }
    })
  }
</script>
  