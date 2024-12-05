<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Pesanan</h1>
    <form action="/pesanan/update/<?= $pesanan['id']; ?>" method="post">
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <option value="pending" <?= $pesanan['status'] == 'proses' ? 'selected' : ''; ?>>Proses</option>
                <option value="selesai" <?= $pesanan['status'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
                <option value="dibatalkan" <?= $pesanan['status'] == 'dibatalkan' ? 'selected' : ''; ?>>Dibatalkan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/pesanan" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>