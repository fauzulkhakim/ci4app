<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?= base_url('komik/create'); ?>" class="btn btn-primary mt-3">Tambah Data Komik</a>
            <h1>Daftar Komik</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($komik as $k) : ?>
                        <tr>
                            <th scope="row" style="vertical-align: middle;"><?= $no++; ?></th>
                            <td><img src="/img/<?= $k['sampul']; ?>" width="100" alt=""></td>
                            <td style="vertical-align: middle;"><?= $k['judul']; ?></td>
                            <td style="vertical-align: middle;">
                                <a href="<?= base_url('/komik/detail/' . $k['slug']); ?> " class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>