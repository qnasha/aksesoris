<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <center>
        <h1>Kategori Pesanan</h1>
    </center>
    <a href="/kategori/create" class="btn btn-primary mb-3">Tambah</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Dibuat Pada</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($kategori)): ?>
                <?php foreach ($kategori as $i => $k): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($k['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= date('Y-m-d H:i:s', strtotime($k['dibuat_pada'])); ?></td>
                        <td>
                            <a href="/kategori/edit/<?= $k['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/kategori/delete/<?= $k['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada kategori ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>