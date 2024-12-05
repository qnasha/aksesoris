<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Item Pesanan</h1>
    <form action="/item_pesanan/store" method="post" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="produk_id">Produk:</label>
            <select id="produk_id" name="produk_id" class="form-control" required>
                <option value="">Pilih Produk</option>
                <?php foreach ($produk as $p): ?>
                    <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="kuantitas">Kuantitas:</label>
            <input type="number" id="kuantitas" name="kuantitas" class="form-control" required min="1">
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" class="form-control" required>
        </div>

        <input type="hidden" name="pesanan_id" value="<?= $pesanan_id; ?>">

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/item_pesanan/<?= $pesanan_id; ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>