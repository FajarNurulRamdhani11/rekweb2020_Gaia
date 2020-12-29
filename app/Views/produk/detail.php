<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 mt-5 mr-5 pr-5">
            <img src="/img/<?= $produk['gambar']; ?>" width="100%">
        </div>
        <div class="col mt-5">
            <span class="align-middle">
                <h3 class="display-4"><?= $produk['nama']; ?></h3>
                <p class="display-5"><?= $produk['kategori']; ?></p>
                <br>
                <h3 class="font-weight-light">Rp. <?= $produk['harga']; ?></h3>
                <br>
                <h5 class="font-weight-light">Size</h5>
                <div class="dropdown mb-5">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Choose Size
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Small</a>
                        <a class="dropdown-item" href="#">Medium</a>
                        <a class="dropdown-item" href="#">Large</a>
                        <a class="dropdown-item" href="#">Extra Large</a>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Add To Cart</button>
            </span>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>