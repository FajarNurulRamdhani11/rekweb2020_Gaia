<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content-admin'); ?>
<div class="col">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Daftar Produk</h1>
            <a href="admin/tambah-produk" class="btn btn-primary mt-3">Tambah produk</a>
            <br><br>
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
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>

                <?php $i = 5 * $currentPage - 4; ?>
                <?php foreach ($produk as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/img/<?= $p['gambar']; ?>" alt="" class="gambar"></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['kategori']; ?></td>
                        <td><?= $p['harga']; ?></td>
                        <td>
                            <span>
                                <a href="/admin/edit/<?= $p['id']; ?>" class="btn btn-warning">Edit</a>
                            </span>
                            <span>
                                <form action="/admin/<?= $p['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                                </form>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?= $pager->links('produk', 'produk_pagination'); ?>
    </div>
</div>

<?= $this->endSection(); ?>