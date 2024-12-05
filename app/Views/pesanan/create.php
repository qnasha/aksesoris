<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Tambah Pesanan</h1>
    <form action="/pesanan/store" method="post">
        <div class="form-group">
            <label for="pesanan_id">No Pesanan:</label>
            <select id="pesanan_id" name="meja_id" class="form-control" required>
                <option value="">Pilih Pesanan</option>
                <?php foreach ($meja as $p): ?>
                    <option value="<?= $p['id']; ?>"><?= $p['nomor_pesanan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="pelanggan_id">Pelanggan:</label>
            <select id="pelanggan_id" name="pelanggan_id" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="produk_id">Produk:</label>
            <select id="produk_id" name="produk_id" class="form-control" required>
                <option value="">Pilih Produk</option>
                <?php foreach ($produk as $p): ?>
                    <option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div> -->

        <!-- <div class="form-group">
            <label for="kuantitas">Kuantitas:</label>
            <input type="number" id="kuantitas" name="kuantitas" class="form-control" required>
        </div> -->


        <!-- <div class="form-group">
            <?php foreach ($produk as $p): ?>
                <div class="form-check">
                    <input class="form-check-input" name="produk_id[]" type="checkbox" value="<?= $p['id']; ?>">
                    <label class="form-check-label"><?= $p['nama']; ?></label>
                </div>
            <?php endforeach; ?>
        </div> -->

        <div class="form-group">
            <label for="produk_id">Pilih Produk:</label>
            <?php foreach ($produk as $p): ?>
                <div class="form-check">
                    <input class="form-check-input" name="produk_id[]" type="checkbox" value="<?= $p['id']; ?>" id="produk_<?= $p['id']; ?>">
                    <label class="form-check-label" for="produk_<?= $p['id']; ?>"><?= $p['nama']; ?></label>

                    <!-- Input kuantitas untuk setiap produk -->
                    <input type="number" name="kuantitas[<?= $p['id']; ?>]" class="form-control mt-2" placeholder="Masukkan Kuantitas" disabled>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/pesanan" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    // Aktifkan input kuantitas hanya saat checkbox dicentang
    document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let input = this.parentElement.querySelector('input[type="number"]');
            if (this.checked) {
                input.removeAttribute('disabled');
            } else {
                input.setAttribute('disabled', 'disabled');
                input.value = ''; // Hapus nilai jika checkbox tidak dicentang
            }
        });
    });
</script>
<?= $this->endSection() ?>