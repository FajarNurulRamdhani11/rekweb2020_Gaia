<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mtk-2">Detail Produk</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $produk['gambar']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama']; ?></h5>
                            <p class="card-text"><b>Kategori : </b><?= $produk['kategori']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Harga : </b><?= $produk['harga']; ?></small></p>

                            <a href="/produk/edit/<?= $produk['kode']; ?>" class="btn btn-warning">Edit</a>


                            <form action="/produk/<?= $produk['id']; ?> " method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');">Delete</button>
                            </form>

                            <br><br>


                            <a href="/produk">Kembali ke daftar komik</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>