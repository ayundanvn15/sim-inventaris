<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transaksi Masuk Sarana</h3>
          
                
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
                    <th>Tanggal Masuk</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php

                    $no = 0;
                    if(isset($_POST['filter_tgl'])){
                      $mulai = $_POST['tgl_mulai'];
                      $selesai = $_POST['tgl_selesai'];

                    if($mulai!=null || $selesai!=null){
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_masuksarana
                      INNER JOIN tb_sarana ON tb_masuksarana.id_sarana = tb_sarana.id_sarana WHERE tgl_masuk
                      BETWEEN '$mulai' and '$selesai' order by id_masuksarana DESC;");

                    } else {
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_masuksarana
                        INNER JOIN tb_sarana ON tb_masuksarana.id_sarana = tb_sarana.id_sarana");
                    }

                    } else {
                    
                      $query = mysqli_query($koneksi, "SELECT * FROM tb_masuksarana
                      INNER JOIN tb_sarana ON tb_masuksarana.id_sarana = tb_sarana.id_sarana");
                    }

                    while ($msk = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td width="2%"><?php echo $no?></td>
                    <td><?php echo $msk['tgl_masuk'];?></td>
                    <td><?php echo $msk['nama_sarana'];?></td>
                    <td><?php echo $msk['jumlah'];?></td>
                    <td><?php echo $msk['harga_satuan'];?></td>
                    <td><?php echo $msk['total'];?></td>
                  </tr>
                  <?php }?>
                  </tbody>
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
            <h4 class="modal-title">Data Masuk Sarana</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="get" action="master/masuk_sarana/tambah_masuk.php">
            <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExempleInput4">Tanggal Masuk</label>
                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Tanggal Masuk" name="tgl_masuk" required>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput2">Nama</label>
                <select type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Barang" name="nama_sarana" required>>
                  <option value="">--Pilih--</option>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_sarana");
                    while ($msk = mysqli_fetch_array($query)) {
                    
                    ?>
                  <option value="<?php echo $msk['id_sarana']; ?>"><?php echo $msk['nama_sarana']; ?></option>

                  <?php
                      }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput3">Jumlah</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Jumlah" name="jumlah" >
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput3">Harga Satuan</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Satuan" name="harga_satuan" >
              </div>
              <div class="form-group">
                <label for="formGroupExempleInput3">Total</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Total" name="total" >
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
  function hapus_masuk(data_id){
    //alert('ok');
    //window.location=("master/masuk_sarana/hapus_masuk.php?id_masuksarana="+data_id);
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
        window.location=("master/masuk_sarana/hapus_masuk.php?id_masuksarana="+data_id);
      }
    })
  }
</script>
  