<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<div class="container mt-4">
    <div class="row">
        <div class="col mt-5">
            <div class="alert alert-primary title" role="alert">
                <h5>Articles</h5>
            </div>
            <a href="/komik/create" class="btn btn-primary mt-3" style="background-color: darkblue; color: white;">Add Article Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $i = 1;
                     foreach ($komik as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/img/<?= $k['sampul']; ?>" class="sampul" alt=""></td>
                        <td><?= $k['judul']; ?></td>
                        <td>
                            <a href="/komik/<?= $k['slug'];?>" class="btn btn-primary">Details</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection();?>