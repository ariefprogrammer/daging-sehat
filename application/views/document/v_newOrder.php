<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php 
    $lasCode = $getLastId->id_document;
    $newCode = $lasCode + 1;
    ?>

    <div class="row">
        <div class="col-lg-8">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="id_document" class="col-sm-2 col-form-label">ID Order</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_document" name="id_document" value="<?php echo $newCode?>" readonly>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name_document" placeholder="Your name">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone_document" placeholder="Your number">
                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email_document" placeholder="Your email">
                        <input type="hidden" class="form-control" id="pic" name="pic_document" value="<?= $user['id']; ?>">
                        <input type="hidden" class="form-control" id="date_created_document" name="date_created_document" value="<?php echo date("Y-m-d")?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthday" class="col-sm-2 col-form-label">Date of birthday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="birthday" name="birthday_document">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="destination" class="col-sm-2 col-form-label">Destination</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="destination" name="destination_document">
                            <?php
                                echo '<option value="">--choose destination--</option>';
                                foreach ($destination as $dest) {
                                    echo '<option value="'.$dest->id_country.'">'.$dest->name_country.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                  </div>

                <!-- <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">                    
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image_document">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>  -->                       

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="submit_document" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 