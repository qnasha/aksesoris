<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Pelanggan</h1>
    <a href="/pelanggan/create" class="btn btn-primary mb-3">Tambah Pelanggan</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Dibuat Pada</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pelanggan) > 0): ?>
                <?php foreach ($pelanggan as $p): ?>
                    <tr>
                        <td><?= $p['id']; ?></td>
                        <td><?= $p['nama']; ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($p['dibuat_pada'])); ?></td> <!-- Format tanggal -->
                        <td>
                            <a href="/pelanggan/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/pelanggan/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pelanggan ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>