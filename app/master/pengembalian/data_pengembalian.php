    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengembalian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Add Data
                </button>
                <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Nama Pengembali</th>
                    <th>No KTP</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian
                    INNER JOIN tb_sarana ON tb_pengembalian.id_sarana = tb_sarana.id_sarana");
                    
                    while ($pmnb = mysqli_fetch_array($query)) {
                      $no++
                    ?>
                  <tr>
                    <td width="2%"><?php echo $no?></td>
                    <td><?php echo $pmnb['nama_sarana'];?></td>
                    <td><?php echo $pmnb['nama'];?></td>
                    <td><?php echo $pmnb['no_ktp'];?></td>
                    <td><?php echo $pmnb['jml_pengembalian'];?></td>
                    <td><?php echo $pmnb['tgl_kembali'];?></td>
                    <td>
                      <a onclick="hapus_pengembalian(<?php echo $pmnb['id_pengembalian']?>)" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i>Delete</a> 
                      <a href="index.php?page=edit-pengembalian&& id_pengembalian=<?php echo $pmnb['id_pengembalian'];?>" class="btn btn-sm btn-success "><i class="nav-icon fas fa-edit"></i>Edit</a>
                    </td>
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
            <h4 class="modal-title">Data Pengembalian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="get" action="master/pengembalian/tambah_pengembalian.php">
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Barang</label>
                <select name="nama_sarana" class="form-control">
                  <option value="">--Pilih--</option>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_sarana");
                    while ($pmnj = mysqli_fetch_array($query)) {
                    
                  ?>
                  <option value="<?php echo $pmnj['id_sarana'];?>"><?php echo $pmnj['nama_sarana'];?></option>

                  <?php }?>
                  
                </select>
              </div>
              <div class="form-group">
                <label>Nama Pengembali</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pengembali" name="nama" required>
              </div>
              <div class="form-group">
                <label>No KTP</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="No KTP" name="no_ktp" required>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Jumlah" name="jml_pengembalian" required>
              </div>
              <div class="form-group">
                <label>Tanggal Pengembali</label>
                <input type="date" class="form-control" id="formGroupExampleInput" placeholder="yyy/dd/mm" name="tgl_kembali">
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
  function hapus_pengembalian(data_id){
    //alert('ok');
    //window.location=("master/pengembalian/hapus_pengembalian.php?id_pengembalian="+data_id);
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
        window.location=("master/pengembalian/hapus_pengembalian.php?id_pengembalian="+data_id);
      }
    })
  }
</script>
  