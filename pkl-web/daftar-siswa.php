<?php
require_once 'koneksi.php';

// Ambil semua data siswa, urutkan berdasarkan id
$query = "SELECT * FROM siswa ORDER BY id ASC";
$stmt = $pdo->query($query);
$siswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f4f4f4; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #4c56af; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn { padding: 6px 12px; text-decoration: none; border-radius: 5px; color: white; }
        .btn-tambah { background: #4c56af; display: inline-block; margin-bottom: 15px; }
        .btn-tambah:hover { background: #4c56af; }
        .btn-edit { background: #2196F3; }
        .btn-edit:hover { background: #0b7dda; }
        .btn-hapus { background: #f44336; border: none; cursor: pointer; }
        .btn-hapus:hover { background: #da190b; }
    </style>
</head>
<body>

<div class="container">
    <h2> Daftar Siswa</h2>

    <a href="tambah-siswa.php" class="btn btn-tambah"> Tambah Siswa</a>

    <?php if (count($siswa) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($siswa as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= htmlspecialchars($s['nama']) ?></td>
                <td><?= htmlspecialchars($s['email']) ?></td>
                <td><?= htmlspecialchars($s['kelas']) ?></td>
                <td><?= $s['tgl_daftar'] ?></td>
                <td>
                    <a href="edit-siswa.php?id=<?= $s['id'] ?>" class="btn btn-edit"> Edit</a>

                    <form method="POST" action="hapus-siswa.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                        <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"> Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="color: #999;">Belum ada data siswa.</p>
    <?php endif; ?>
</div>

</body>
</html>