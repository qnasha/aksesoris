<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">
        <center>PRODUK AKSESORIS</center>
    </h1>
    <a href="/produk/create" class="btn btn-primary mb-3">Tambah</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Membuat array untuk memetakan kategori
            $kategoriMap = [];
            foreach ($kategori as  $k) {
                $kategoriMap[$k['id']] = $k['nama'];
            }
            ?>
            <?php foreach ($produk as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['deskripsi']; ?></td>
                    <td>Rp. <?= number_format($p['harga'], 0, ',', '.'); ?></td> <!-- Format harga -->
                    <td><?= isset($kategoriMap[$p['kategori_id']]) ? $kategoriMap[$p['kategori_id']] : 'Kategori Tidak Ditemukan'; ?></td> <!-- Ganti dengan nama kategori -->
                    <td>
                        <a href="/produk/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/produk/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>