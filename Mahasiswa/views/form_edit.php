<!DOCTYPE html>
<html lang="en">
<body>
    <h3>Edit Mahasiswa</h3>
    <form action="index.php?action=edit" method="post">
        <input type="hidden" name="nim" value="<?= htmlspecialchars($row['nim']) ?>">
        Nama: <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>"><br>
        Umur: <input type="number" name="umur" value="<?= htmlspecialchars($row['umur']) ?>"><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>