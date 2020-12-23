<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-2">Daftar Produk</h1>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/produk/create" class="btn btn-primary mt-3">Tambah produk</a>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($produk as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['gambar']; ?>" alt="" class="gambar"></td>
                            <td><?= $k['nama']; ?></td>
                            <td>
                                <a href="/produk/<?= $k['kode']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?= $this->endSection(); ?>