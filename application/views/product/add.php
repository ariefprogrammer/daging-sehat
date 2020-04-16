<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- <?php echo var_dump($detailsDocument)?> -->

            <?php
            $id_lama = $lastId->id_barang;
            $id_baru = $id_lama + 1;
            ?>

            <form method="post" action="<?= base_url('products/add')?>" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ID product</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id_baru" value="<?= $id_baru?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Title product</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Insert as a text">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Harga product</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang" placeholder="Set default Rupiah">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Bagian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bagian_barang" name="bagian_barang" placeholder="Dada, iga, dll">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Tokopedia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="link_tokopedia" name="link_tokopedia" placeholder="Tokopedia url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="link_instagram" name="link_instagram" placeholder="Instagram url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" placeholder="Deskripsi barang secara detail..."></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Thumbnail (720 x 960)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="thumbnail_barang" name="thumbnail_barang">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Status barang</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status_barang" name="status_barang">
                            <option value="1">draft</option>
                            <option value="2">publish</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button name="submit_barang" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>
<!-- /.container-fluid -->