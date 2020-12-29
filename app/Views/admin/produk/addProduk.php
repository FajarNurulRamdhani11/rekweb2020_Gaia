<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content-admin'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Produk</h2>

            <form action="/admin/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="validationServer05Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kategori" name="kategori" value="<?= old('kategori'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="custom-file-label" for="gambar">Pilih gambar..</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>