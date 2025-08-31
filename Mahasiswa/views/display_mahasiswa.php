<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <!-- Form Pencarian -->
    <form action="index.php" method="get">
        <label>Cari (NIM atau Nama): <input type="text" name="search" value="<?= htmlspecialchars($search ?? ''); ?>"></label>
        <button type="submit">Cari</button>
    </form>
    <br>
    <!-- Link Tambah Mahasiswa Baru -->
    <a href="index.php?action=create">Tambah Mahasiswa Baru</a>
    <br><br>
    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nim']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['umur']); ?></td>
                    <td>
                        <a href="index.php?action=detail&nim=<?= urlencode($row['nim']); ?>">View Detail</a> |
                        <a href="index.php?action=delete&nim=<?= urlencode($row['nim']); ?>" onclick="return confirm('Yakin hapus?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Tidak ada data mahasiswa.</p>
    <?php endif; ?>
</body>
</html>