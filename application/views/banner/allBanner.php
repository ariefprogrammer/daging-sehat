    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Banner</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Subtitle</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allBanners as $data):?>
                    <tr>
                      <td><?= $data['title_banner']?></td>
                      <td><?= $data['title2_banner']?></td>
                      <td><?= $data['image_banner']?></td>
                      <td><?php if($data['image_banner'] == 1){ echo "draft";}else{echo "published";}?></td>
                      <td><a href="<?= site_url('banner/update/').$data['id_banner']?>" class="btn btn-small"> <i class="fas fa-edit"></i> </a></td>
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
