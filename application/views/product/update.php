<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID product</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_baru" value="<?= $product['id_barang']?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title product</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $product['nama_barang']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Harga product</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="<?= $product['harga_barang']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Bagian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bagian_barang" name="bagian_barang" value="<?= $product['bagian_barang']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang"><?= $product['deskripsi_barang']?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Thumbnail (720 x 960)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="thumbnail_barang" name="thumbnail_barang" value="">
                        <input type="hidden" class="form-control" id="old_thumbnail" name="old_thumbnail" value="<?= $product['thumbnail_barang']?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Status barang</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_barang" name="status_barang">
                            <?php if($product['status_barang'] == 1){?>
                                <option value="1" selected>draft</option>
                                <option value="2">publish</option>
                            <?php }else{?>
                                <option value="1">draft</option>
                                <option value="2" selected>publish</option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="update_barang" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>