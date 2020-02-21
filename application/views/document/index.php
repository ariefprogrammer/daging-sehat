<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php foreach($documents as $row):?>
    <div class="card" style="width: 35%; margin-top: 2%; padding: 1%">
      <img style="width:100%; max-width: 450px;" class="card-img-top" src="<?php echo base_url("assets/img/document/").$row->image_document?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row->name_document?></h5>
        <div class="row">
            <p class="card-text col-6"><?php echo $row->destination_document?></p>
            <p class="card-text col-6"><?php echo $row->name?></p>
        </div>
        <a href="#" class="btn btn-primary">Details</a>
      </div>
    </div>
    <?php endforeach;?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 