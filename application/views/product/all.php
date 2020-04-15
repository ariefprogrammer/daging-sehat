    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All data products</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Harga</th>
                      <th>Bagian</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allProducts as $data):?>
                    <tr>
                      <td><?= $data['nama_barang']?></td>
                      <td><?= $data['harga_barang']?></td>
                      <td><?= $data['bagian_barang']?></td>
                      <td>status</td>
                      <td><a href="<?= site_url('products/details/').$data['id_barang']?>" class="btn btn-small"> <i class="fas fa-eye"></i> </a>
                        <a href="<?= site_url('products/update/').$data['id_barang']?>" class="btn btn-small"> <i class="fas fa-edit"></i> </a></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
