<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-center bg-dark">
                <p><img style="width: 60%; margin: 3%" src="<?= base_url('assets/img/slider/').$imageById->image_slider?>"> </p>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID Image</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_slider_image" name="id_slider_image" value="<?= $imageById->id_slider_image?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID Product</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $imageById->id_barang?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">                    
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_slider" name="image_slider">
                            <input type="hidden" class="form-control" id="old_thumbnail" name="old_image_slider" value="<?= $imageById->image_slider?>">
                            <label class="custom-file-label" for="image_slider">Choose file</label>
                        </div>
                    </div>
                </div>                        

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="update_slider_image" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 