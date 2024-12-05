<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Pembayaran</h1>
    <form action="/pembayaran/store" method="post">
        <input type="hidden" name="pesanan_id" value="<?= $pesanan_id; ?>">

        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" required>
                <option value="tunai">Tunai</option>
                <option value="kartu_kredit">Kartu Kredit</option>
                <option value="kartu_debit">Kartu Debit</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <a href="/pembayaran" class="btn btn-secondary mt-3">Kembali</a>
</div>

<?= $this->endSection() ?>