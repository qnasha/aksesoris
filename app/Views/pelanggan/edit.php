<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Pelanggan</h1>
    <form action="/pelanggan/update/<?= $pelanggan['id']; ?>" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?= $pelanggan['nama']; ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>