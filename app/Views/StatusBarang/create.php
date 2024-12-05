<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Pesanan</h1>
    <form action="/status_barang/store" method="post">
        <div class="form-group">
            <label for="nomor_pesanan">Nomor Pesanan:</label>
            <input type="text" id="nomor_pesanan" name="nomor_pesanan" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_barang">Total Barang:</label>
            <input type="number" id="total_barang" name="total_barang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status_barang">Status:</label>
            <select id="status_barang" name="status_barang" class="form-control" required>
                <option value="tersedia">Tersedia</option>
                <option value="tidak_tersedia">Tidak Tersedia</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/status_barang" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
