<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Pelanggan</h1>
    <form action="/pelanggan/store" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pelanggan" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>