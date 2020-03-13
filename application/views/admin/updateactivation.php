<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <form method="post" action="<?= base_url('admin/usermanagement/').$userbyid['id']; ?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="id_document" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_document" name="id_document" value="<?=$userbyid['name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name_document" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_document" name="name_document" placeholder="Your name" value="<?=$userbyid['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name_document" class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="role_id">
                      <option value="1" <?php if($userbyid['role_id'] == "1") echo "selected"?>>SuperAdmin</option>
                      <option value="2" <?php if($userbyid['role_id'] == "2") echo "selected"?>>Admin</option>
                      <option value="3" <?php if($userbyid['role_id'] == "3") echo "selected"?>>User</option>
                    </select>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 