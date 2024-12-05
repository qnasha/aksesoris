<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Add Produk</h1>
    <form action="/produk/store" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="text" id="harga" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori:</label>
            <select id="kategori_id" name="kategori_id" class="form-select" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <a href="/produk" class="btn btn-secondary mt-3">Back</a>
</div>

<?= $this->endSection() ?>