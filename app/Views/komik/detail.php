<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col mt-5">
            <div class="alert alert-primary title" role="alert">
                <h5>Article Details</h5>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $komik['sampul'];?>" alt="..." class='detailsampul'>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <p class="card-text"><b>Penulis : </b><?= $komik['penulis']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Tema : </b><?= $komik['temaa']; ?></small></p>

                            <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-success">Edit</a>

                            <form action="/komik/<?= $komik['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?'); ">Delete</button>
                            </form>

                            <br><br>
                            <a href="/komik">Back to article list...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();?>