<!-- Begin Page Content -->
<div class="container-fluid">
    <?= var_dump($banners)?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- <?php echo var_dump($detailsDocument)?> -->

            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title Banner</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title_banner" name="title_banner" value="<?= $banners['title_banner']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Subtitle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title2_banner" name="title2_banner" value="<?= $banners['title2_banner']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Photo</div>
                    <div class="col-sm-10">                    
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_banner" name="image_banner">
                            <input type="hidden" class="form-control" id="old_banner" name="old_banner" value="<?= $banners['image_banner']?>">
                            <label class="custom-file-label" for="image_banner">Choose file</label>
                        </div>
                    </div>
                </div>  

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="id_status" name="id_status">
                            <option value="1">draft</option>
                            <option value="2">publish</option>
                        </select>
                    </div>
                </div>                          

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="update_banner" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 