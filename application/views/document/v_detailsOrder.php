<style type="text/css">
.segitiga-dts {
    border-top: solid 20px transparent;
    border-bottom: solid 20px transparent;
    border-left: solid 20px #e5e5e5;
    height: 0;
    width: 0;
    z-index: 1;
}

/* The actual timeline (the vertical ruler) */
.timeline-dts {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline-dts::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: #e1e1e1;
  top: 0;
  bottom: 0;
  left: 9.75%;
  margin-left: -3px;
}

/* Container around content */
.container-dts {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 93%;
}

/* The circles on the timeline */
.container-dts::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}


/* Place the container to the right */
.right-dts {
  left: 10%;
}

/* Add arrows to the left container (pointing right) */
.left-dts::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right-dts::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right-dts::after {
  left: -1.4%;
}

/* The actual content */
.content-dts {
  padding: 20px 30px;
  background-color: #eeeeee;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline-dts::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container-dts {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container-dts::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left-dts::after, .right-dts::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right-dts {
  left: 0%;
  }
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><b><?php echo "Visa " .$detailsDocument->name_country?></b></h1>

    <div class="card" style="width: 100%; margin-top: 2%; padding: 1%; background-color: #eeeeee" >
      <div class="card-body">
        <h5 class="card-title"><?php echo "date created : ".$detailsDocument->date_created_document?></h5>
        <span class="card-text" style="margin-left: 1%"><?php echo "a.n. ". $detailsDocument->name_document?></span><br>
        <span class="card-text" style="margin-left: 1%"><?php echo "user by: ".$detailsDocument->name?></span> <br>
        <span class="card-text" style="margin-left: 1%"><?php echo "Status : ".$detailsDocument->name_status?></span><br>
        <?php foreach($filesByDocument as $files):?>
          <img style="width: 23%" src="<?php echo base_url('assets/img/document/').$files->image_document?>">
        <?php endforeach;?>
        <br>
        <div class="float-right" style="margin-top: 2%">
          <a href="<?php echo site_url('submission/addfile/').$detailsDocument->id_document?>"><button class="btn btn-info">Attachment</button></a>
        </div>
      </div>
    </div>

    <div class="timeline-dts" style="padding-top: 1%;">
    <?php foreach ($records as $rec):?>
      <div class="container-dts right-dts">
        <div class="content-dts">
          <h5 class="card-title"><?php echo "Last Updated ".$rec->date_updated?></h5>
          <span class="card-text"><?php echo "a.n ".$rec->name_document_update?></span><br>
          <span class="card-text"><?php echo "User by: ".$rec->name?></span><br>
          <span class="card-text"><?php echo "Status : ".$rec->name_status?></span><br>
          <span class="card-text"><?php echo "Notes : ".$rec->notes_updated?></span><br>
        </div>
      </div>
    <?php endforeach;?> 
    </div>

    <!-- <?php foreach ($records as $rec):?>
        <div class="card" style="width: 100%; margin-top: 2%; padding: 1%">
          <div class="card-body">
            <h5 class="card-title"><?php echo "Last Updated ".$rec->date_updated?></h5>
            <span class="card-text" style="margin-left: 1%"><?php echo "a.n ".$rec->name_document_update?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "User by: ".$rec->name?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "Status : ".$rec->name_status?></span><br>
            <span class="card-text" style="margin-left: 1%"><?php echo "Notes : ".$rec->notes_updated?></span><br>
          </div>
        </div>
    <?php endforeach;?> -->



<div id="newrecord" class="text-center" <?php if ($this->session->userdata('role_id') == 2){?>style="display:block; margin-top: 2%"<?php }else{ ?>style="display:none"<?php } ?> >
    <a href="<?php echo site_url('documents/newrecord/').$detailsDocument->id_document?>"><button class="btn btn-primary">New Record</button></a>
</div>




<!-- <div class="timeline-dts">
  <div class="container-dts right-dts">
    <div class="content-dts">
      <h2>2016</h2>
      <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
    </div>
  </div>

  <div class="container-dts right-dts">
    <div class="content-dts">
      <h2>2012</h2>
      <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
    </div>
  </div>
  <div class="container-dts right-dts">
    <div class="content-dts">
      <h2>2007</h2>
      <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
    </div>
  </div>
</div> -->





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 
