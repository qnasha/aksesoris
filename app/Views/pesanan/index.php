<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Pesanan</h1>
    <a href="/pesanan/create" class="btn btn-primary mb-3">Tambah Pesanan</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor Pesanan</th>
                <th>Pelanggan</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Waktu Pesanan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($items) > 0): ?>
                <?php foreach ($items as $i => $p): ?>
                    <tr>

                        <td><?= $i + 1 ?></td>
                        <td><?= isset($p['nomor_pesanan']) ? $p['nomor_pesanan'] : 'Tidak ada'; ?></td>
                        <td><?= isset($p['nama']) ? $p['nama'] : 'Tidak ada'; ?></td>
                        <td>
                            <ul>
                                <?php foreach ($p['detail'] as $d): ?>
                                    <li><?= $d['nama']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td>Rp.<?= isset($p['total']) ? $p['total'] : 'Tidak ada'; ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($p['waktu_pesanan'])); ?></td>
                        <td><?= ucfirst($p['status']); ?></td>
                        <td>
                            <a href="/pesanan/detail/<?= $p['pesanan_id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                            <a href="/pesanan/edit/<?= $p['pesanan_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/pesanan/delete/<?= $p['pesanan_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pesanan ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>