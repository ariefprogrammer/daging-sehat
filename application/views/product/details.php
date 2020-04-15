<div class="container-fluid">
	<div style="margin-top: 15px; margin-bottom: 20px;">
		<a href="<?= site_url('products/update/'.intval($product['id_barang']))?>" class="btn btn-primary"><i class="fas fa-plus"></i> Edit Product</a>
	</div>
	<div class="text-center">
		<p><img style="width: 144px; height: 192px; margin-bottom: 5%" src="<?= base_url('assets/img/thumbnail/').$product['thumbnail_barang']?>"> </p>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<p>Nama product:</p>
			<p>Harga product :</p>
			<p>Bagian :</p>
			<p>Deskripsi :</p>
			<p>Status :</p>
		</div>
		<div class="col-sm-9">
			<p><?= $product['nama_barang']?></p>
			<p><?= "Rp. ".$product['harga_barang']?></p>
			<p><?= $product['bagian_barang']?></p>
			<p><?= $product['deskripsi_barang']?></p>
			<p><?php if ($product['status_barang'] == 1) { echo "Draft"; }else{ echo "Published";}?></p>
		</div>
	</div>

	<div style="margin-top: 15px; margin-bottom: 20px;">
		<a href="<?= site_url('products/addFile/'.intval($product['id_barang']))?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Slider Image</a>
	</div>

	<?php foreach($sliders as $slider):?>
	<div class="col-sm-3">
		<img src="<?= base_url('assets/img/slider/').$slider['image_slider']?>">
	</div>
	<?php endforeach;?>
	
</div>