<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- <?php echo var_dump($detailsDocument)?> -->

            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID Document</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_document" name="id_document" value="<?php echo $detailsDocument->id_document?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Document</div>
                    <div class="col-sm-10">                    
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image_document" name="image_document">
                            <label class="custom-file-label" for="image_document">Choose file</label>
                        </div>
                    </div>
                </div>                        

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="submit_file_document" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 