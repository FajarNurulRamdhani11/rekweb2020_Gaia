<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- start carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/model3.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/img/model1.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/img/model2.jpg" class="d-block w-100">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- end carousel -->

<!-- start card -->
<div class="container mt-4">
    <h1 class="display-4 text-center">OUR TOP PRODUCT</h1>
    <div class="row mt-2">
        <?php foreach ($produk as $p) : ?>
            <div class="col-sm-4 mt-3 d-flex justify-content-center">
                <div class="card rounded shadow-sm border-0" style="width: 20rem;">
                    <div class="card-body p-4"><img src="/img/<?= $p['gambar']; ?>" alt="" class="img-fluid d-block mx-auto mb-3">
                        <h5> <a href="/produk/<?= $p['kode']; ?>" class="text-dark"><?= $p['nama']; ?></a></h5>
                        <p class="small text-muted font-italic"><?= $p['kategori']; ?></p>
                        <br>
                        <h5>Rp. <?= $p['harga']; ?></h5>
                        <a class="btn" href="">Beli</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- end card -->

<!-- Product -->
<a href="/produk">
    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
        </div>
    </div>
</a>
<!-- End Product -->

<hr>

<!-- Join -->
<div class="container text-center">
    <h1 class="display-5">Join Our List</h1>
    <p>To get early information about our latest product</p>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Address">
            <br>
            <button type="submit" class="btn btn-dark">Submit</button>
        </div>
    </form>
</div>
<!-- End Join -->

<?= $this->endSection(); ?>