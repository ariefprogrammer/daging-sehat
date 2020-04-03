<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> - <?= $this->uri->segment(3)?></h1>

    <div class="row">
        <div class="col-lg-8">

            <!-- <?= form_open_multipart('documents/newOrder'); ?> -->
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID Document</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_document" name="id_document" value="<?php echo $thisrecord->id_document?>" readonly>
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name_document" value="<?php echo $thisrecord->name_document?>" readonly>
                        <input type="hidden" class="form-control" id="date_updated" name="date_updated" value="<?php echo date("Y-m-d")?>">
                        <input type="hidden" class="form-control" id="pic_updated" name="pic_updated" value="<?= $user['id']; ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone_document" value="<?php echo $thisrecord->phone_document?>" readonly>
                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email_document" value="<?php echo $thisrecord->email_document?>" readonly>
                        <input type="hidden" class="form-control" id="pic" name="pic_document" value="<?= $user['id']; ?>">
                        <input type="hidden" class="form-control" id="date_created_document" name="date_created_document" value="<?php echo date("Y-m-d")?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
    
                 <div class="form-group row">
                    <label for="destination" class="col-sm-2 col-form-label">Destination</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email_document" value="<?php echo $thisrecord->name_country?>" readonly>
                    </div>
                  </div>

                <div class="row bg-info" style="padding: 5%; border-radius: 20px">

                    <select class="form-control" id="id_status" name="id_status">
                        <option value="2">Processed</option>
                        <option value="3">Done</option>
                    </select>

                    <div class="col-6" style="margin-top: 2%">
                        <textarea placeholder="Your notes" class="form-control" id="notes_updated" rows="3" name="notes_updated"></textarea>
                    </div>
                    <div class="col-6" style="margin-top: 2%">
                        <button name="submit_record" type="submit" class="btn btn-primary" style="width: 100%; height: 100%">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 