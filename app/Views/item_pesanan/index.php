<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Item Pesanan</h1>
    <a href="/item-pesanan/create" class="btn btn-primary mb-3">Tambah Item</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Produk</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($items) > 0): ?>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td>
                            <?php
                            // Ambil nama produk berdasarkan produk_id
                            $produk = array_column($produk, 'nama', 'id'); // Buat array dengan id sebagai key
                            echo isset($produk[$item['produk_id']]) ? $produk[$item['produk_id']] : 'Tidak Ditemukan';
                            ?>
                        </td>
                        <td><?= $item['kuantitas']; ?></td>
                        <td>Rp. <?= number_format($item['harga'], 0, ',', '.'); ?></td> <!-- Format harga -->
                        <td>
                            <a href="/item-pesanan/delete/<?= $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada item pesanan ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>