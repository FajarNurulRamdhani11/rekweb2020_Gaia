<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Banner -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
    </div>
</div>
<!-- End Banner -->

<!-- Product -->
<div class="container">
    <div class="row mt-2">
        <?php foreach ($produk as $p) : ?>
            <div class="col-sm-4 mt-3 d-flex justify-content-center">
                <div class="card rounded shadow-sm border-0" style="width: 20rem;">
                    <div class="card-body p-4"><img src="/img/<?= $p['gambar']; ?>" alt="" class="img-fluid d-block mx-auto mb-3">
                        <h5> <a href="/produk/<?= $p['kode']; ?>" class="text-dark"><?= $p['nama']; ?></a></h5>
                        <p class="small text-muted font-italic"><?= $p['kategori']; ?></p>
                        <br>
                        <h5>Rp. <?= $p['harga']; ?></h5>
                        <a class="btn" href="/detail">
                            <h5>Select Option</h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- End Product -->


<?= $this->endSection(); ?>