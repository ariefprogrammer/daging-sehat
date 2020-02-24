<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo "Visa " .$detailsDocument->name_country?></h1>

    <div class="card" style="width: 100%; margin-top: 2%; padding: 1%">
      <div class="card-body">
        <h5 class="card-title"><?php echo "date created : ".$detailsDocument->date_created_document?></h5>
        <span class="card-text" style="margin-left: 1%"><?php echo "a.n. ". $detailsDocument->name_document?></span><br>
        <span class="card-text" style="margin-left: 1%"><?php echo "user by: ".$detailsDocument->name?></span> <br>
        <span class="card-text" style="margin-left: 1%"><?php echo "Status : ".$detailsDocument->name_status?></span>
      </div>
    </div>

    <?php foreach ($records as $rec):?>
        <div class="card" style="width: 100%; margin-top: 2%; padding: 1%">
          <div class="card-body">
            <h5 class="card-title"><?php echo "Last Updated ".$rec->date_updated?></h5>
            <span class="card-text" style="margin-left: 1%"><?php echo "a.n ".$rec->name_document_update?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "User by: ".$rec->name?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "Status : ".$rec->name_status?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "Notes : ".$rec->notes_updated?></span><br>
          </div>
        </div>
    <?php endforeach;?>



<div id="newrecord" class="text-center" <?php if ($this->session->userdata('role_id') == 2){?>style="display:block; margin-top: 2%"<?php }else{ ?>style="display:none"<?php } ?> >
    <a href="<?php echo site_url('documents/newrecord/').$detailsDocument->id_document?>"><button class="btn btn-primary">New Record</button></a>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
