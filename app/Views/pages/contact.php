<?= $this->extend('layout/template');?>

<?= $this->section('content');?>
<div class="container mt-4">
    <div class="row">
        <div class="col mt-5">
            <div class="alert alert-primary title" role="alert">
                <h5>Contact</h5>
            </div>
            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li><?= $a['tipe'];?></li>
                    <li><?= $a['alamat'];?></li>
                    <li><?= $a['kota'];?></li>
                </ul>
            <?php endforeach;?>
        </div>
    </div>
</div>
<?= $this->endSection();?>