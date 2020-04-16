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
                      <th style="width: 25%">Title</th>
                      <th style="width: 15%">Subtitle</th>
                      <th class="text-center">Image</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allBanners as $data):?>
                    <tr>
                      <td><?= $data['title_banner']?></td>
                      <td><?= $data['title2_banner']?></td>
                      <td class="text-center"><img style="width: 60%" src="<?php echo base_url('assets/img/banner/') .$data['image_banner']?>"></td>
                      <td class="text-center"><?php if($data['id_status'] == 1){ echo "Draft";}else{echo "Published";}?></td>
                      <td class="text-center"><a href="<?= site_url('banner/update/').$data['id_banner']?>" class="btn btn-small"> <i class="fas fa-edit"></i> </a></td>
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
