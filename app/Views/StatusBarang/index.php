<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Detail Pesanan</h1>
    <a href="/status_pesanan/create" class="btn btn-primary mb-3">Tambah Pesanan</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nomor Pesanan</th>
                <th>Total Barang</th>
                <th>Status Barang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($status_pesanan) && count($status_pesanan) > 0): ?>
                <?php foreach ($status_pesanan as $m): ?>
                    <tr>
                        <td><?= $m['id']; ?></td>
                        <td><?= $m['nomor_pesanan']; ?></td>
                        <td><?= $m['total_barang']; ?></td>
                        <td><?= $m['status_barang']; ?></td>
                        <td>
                            <a href="/status_barang/edit/<?= $m['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/status_barang/delete/<?= $m['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada barang ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
