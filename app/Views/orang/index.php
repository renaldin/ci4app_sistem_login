<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<div class="container mt-4">
    <div class="row">
        <div class="col mt-5">
            <div class="alert alert-primary title" role="alert">
                <h5>Student List</h5>
            </div>
            <form action="" method="post">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter search keyword..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $i = 1 + (6 * ($currentPage - 1));
                     foreach ($orang as $o) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $o['nama']; ?></td>
                        <td><?= $o['alamat']; ?></td>
                        <td>
                            <a href="" class="btn btn-primary">Details</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection();?>