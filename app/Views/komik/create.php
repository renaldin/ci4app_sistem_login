<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-8 mt-5">
            <div class="alert alert-primary title" role="alert">
                <h5>Form Add Article Data</h5>
            </div>
                <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('judul'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('penulis'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="temaa" class="col-sm-2 col-form-label">Tema</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('temaa')) ? 'is-invalid' : ''; ?>" id="temaa" name="temaa" value="<?= old('temaa'); ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('temaa'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('sampul'); ?>
                                </div>
                                <label class="custom-file-label" for="sampul">Pilih sampul komik..</label>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Insert -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>