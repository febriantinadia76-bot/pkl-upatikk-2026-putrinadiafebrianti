<?php
$file_data = "data_pendaftaran.json";
$daftar = array();

// Baca data lama
if (file_exists($file_data)) {
    $isi_file = file_get_contents($file_data);
    $daftar = json_decode($isi_file, true);
    if (!is_array($daftar)) {
        $daftar = array();
    }
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $umur = $_POST['umur'];

    // Simpan ke array
    $data_baru = array(
        "nama" => $nama,
        "email" => $email,
        "umur" => $umur,
        "tanggal_daftar" => date("Y-m-d H:i:s")
    );

    $daftar[] = $data_baru;

    // Simpan ke file JSON
    file_put_contents($file_data, json_encode($daftar, JSON_PRETTY_PRINT));

    $pesan = "✅ Data berhasil disimpan!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form + JSON</title>
</head>
<body>

    <h2>📝 Form Pendaftaran</h2>

    <?php if (!empty($pesan)): ?>
        <p style="color:green;"><?php echo $pesan; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" required>
        <br>

        <label>Email:</label><br>
        <input type="email" name="email" required>
        <br>

        <label>Umur:</label><br>
        <input type="text" name="umur" required>
        <br><br>

        <button type="submit">Daftar</button>
    </form>

    <hr>

    <h2>📋 Data Pendaftaran</h2>

    <?php if (count($daftar) > 0): ?>
        <ul>
            <?php foreach ($daftar as $data): ?>
                <li>
                    Nama: <?php echo $data['nama']; ?> |
                    Email: <?php echo $data['email']; ?> |
                    Umur: <?php echo $data['umur']; ?> |
                    Tanggal: <?php echo $data['tanggal_daftar']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Belum ada data.</p>
    <?php endif; ?>

</body>
</html>