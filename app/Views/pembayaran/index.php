<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Pembayaran</h1>
    <a href="/pembayaran/create/<?= $pesanan_id; ?>" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Pesanan ID</th>
                <th>Metode Pembayaran</th>
                <th>Jumlah</th>
                <th>Waktu Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pembayaran) > 0): ?>
                <?php foreach ($pembayaran as $p): ?>
                    <tr>
                        <td><?= $p['id']; ?></td>
                        <td><?= $p['pesanan_id']; ?></td>
                        <td><?= ucfirst($p['metode_pembayaran']); ?></td>
                        <td>Rp. <?= number_format($p['jumlah'], 0, ',', '.'); ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($p['waktu_pembayaran'])); ?></td>
                        <td>
                            <a href="/pembayaran/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pembayaran ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>