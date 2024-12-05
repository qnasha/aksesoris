<!DOCTYPE html>
<html>

<head>
    <title>Edit Kategori</title>
</head>

<body>
    <h1>Edit Kategori</h1>
    <form action="/kategori/update/<?= $kategori['id']; ?>" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $kategori['nama']; ?>" required>
        <button type="submit">Update</button>
    </form>
    <a href="/kategori">Back</a>
</body>

</html>