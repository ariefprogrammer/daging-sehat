<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<?php foreach($imageSliders as $slider):?>
							<div class="item-slick3" data-thumb="<?= base_url('assets/img/slider/').$slider['image_slider']?>">
								<div class="wrap-pic-w">
									<img src="<?= base_url('assets/img/slider/').$slider['image_slider']?>" alt="IMG-PRODUCT">
								</div>
							</div>
						<?php endforeach;?>

					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $details['nama_barang']?>
				</h4>

				<span class="m-text17">
					Rp. <?= $details['harga_barang']?>
				</span>

				<p class="s-text6 p-t-10">
					<?= "Bagian: ".$details['bagian_barang']?>
				</p>

				<p class="s-text3 p-t-10">
					<?= "Deskripsi : ".$details['deskripsi_barang']?>
				</p>
				<div style="padding-top: 6%">
					<a class="p-t-10 btn btn-primary bo-rad-23" href="<?= $details['link_tokopedia']?>">Open Tokopedia</a>
					<a style="margin-left: 3%" class="p-t-10 btn btn-primary bo-rad-23" href="<?= $details['link_instagram']?>">Open Instagram</a>
				</div>


				<!-- <div class="p-t-33 p-b-60">

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
							
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>

							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</div>