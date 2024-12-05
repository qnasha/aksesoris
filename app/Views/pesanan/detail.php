<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Detail Pesanan</h1>
    <ul>
        <li>Nama Pelanggan: <?= $items['nama'] ?></li>
        <li>No Pesanan: <?= $items['nomor_meja'] ?></li>
        <li>Total Pesanan: <?= $items['total'] ?></li>
        <li>Waktu Pesanan: <?= date('d-m-Y H:i:s', strtotime($items['waktu_pesanan'])); ?></li>
        <li>Status Pesanan<?= $items['status'] ?></li>
    </ul>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kuantitas</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($items['detail']) > 0): ?>
                <?php foreach ($items['detail'] as $i => $p): ?>
                    <tr>

                        <td><?= $i + 1 ?></td>
                        <td><?= isset($p['nama']) ? $p['nama'] : 'Tidak ada'; ?></td>
                        <td><?= isset($p['harga']) ? $p['harga'] : 'Tidak ada'; ?></td>
                        <td><?= isset($p['kuantitas']) ? $p['kuantitas'] : 'Tidak ada'; ?></td>


                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pesanan ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="/pesanan" class="btn btn-primary mb-3">Back</a>
</div>

<?= $this->endSection() ?>