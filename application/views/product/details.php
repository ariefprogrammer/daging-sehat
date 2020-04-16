<div class="container-fluid">
	<div style="margin-top: 15px; margin-bottom: 20px;">
		<a href="<?= site_url('products/update/'.intval($product['id_barang']))?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit Product</a>
	</div>
	<div class="text-center">
		<p><img style="width: 144px; height: 192px; margin-bottom: 5%" src="<?= base_url('assets/img/thumbnail/').$product['thumbnail_barang']?>"> </p>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<p>Nama product:</p>
			<p>Harga product :</p>
			<p>Bagian :</p>
			<p>Tokopedia :</p>
			<p>Instagram :</p>
			<p>Deskripsi :</p>
			<p>Status :</p>
		</div>
		<div class="col-sm-9">
			<p><?= $product['nama_barang']?></p>
			<p><?= "Rp. ".$product['harga_barang']?></p>
			<p><?= $product['bagian_barang']?></p>
			<p><a href="<?= $product['link_tokopedia']?>">Open Tokopedia</a></p>
			<p><a href="<?= $product['link_instagram']?>">Open Instagram</a></p> 
			<p><?= $product['deskripsi_barang']?></p>
			<p><?php if ($product['status_barang'] == 1) { echo "Draft"; }else{ echo "Published";}?></p>
		</div>
	</div>
	<br>
	<hr>
	<br>

	<div class="text-center" style=" margin-bottom: 20px;">
		<span style="font-size: 20px; color:black;"><strong>IMAGE SLIDER</strong></span>
	</div>

	<div class="row">
		<?php foreach($sliders as $slider):?>
			<div class="col-sm-3" style="margin-bottom: 3%; margin-left: 2%">
				<img style="width: 100%" src="<?= base_url('assets/img/slider/').$slider['image_slider']?>">
				<a style="margin-top: 2%" href="<?= site_url('products/updateFile/'.intval($slider['id_slider_image']))?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
			</div>
		<?php endforeach;?>
		<a class="col-sm-3 text-center bg-gray-200" style="margin-bottom: 3%; margin-left: 2%" href="<?= site_url('products/addFile/'.intval($product['id_barang']))?>">
				<p style="margin-top: 20%">Add Image Slider</p>
				<i style="margin-bottom: 20%" class="fas fa-plus"></i>
		</a>
	</div>
	
	
</div>