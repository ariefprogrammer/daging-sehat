<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= var_dump($documents)?>

    <?php foreach($documents as $row):?>
    <div class="card" style="width: 100%; margin-top: 2%; padding: 1%">
      <div class="card-body">
        <h5 class="card-title"><?php echo "Visa " .$row->name_country?></h5>
        <span class="card-text" style="margin-left: 1%"><?php echo "a.n. ". $row->name_document?></span><br>
        <span class="card-text" style="margin-left: 1%"><?php echo "User by: ".$row->name?></span><br>
        <span class="card-text" style="margin-left: 1%"><?php echo "Date created : ".$row->date_created_document?></span><br>
        <span class="card-text" style="margin-left: 1%"><?php echo "Status : ".$row->name_status?></span><br>
        <a style="margin-left: 1%; margin-top: 1%" href="<?php echo site_url('documents/details/'). $row->id_document?>" class="btn btn-primary">Details</a>
      </div>
    </div>


    <?php endforeach;?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 