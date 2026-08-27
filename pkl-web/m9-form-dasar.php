<?php
$nama = $email = $kelas = "";
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (isset($_POST['nama']) && !empty($_POST['nama'])) {
        $nama = htmlspecialchars($_POST['nama']);
    } else {
        $error = true;
        $error_nama = "Nama harus diisi!";
    }

    // Validasi Email
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
    } else {
        $error = true;
        $error_email = "Email harus diisi!";
    }

    // Validasi Kelas
    if (isset($_POST['kelas']) && !empty($_POST['kelas'])) {
        $kelas = htmlspecialchars($_POST['kelas']);
    } else {
        $error = true;
        $error_kelas = "Kelas harus diisi!";
    }

    // Jika semua data valid, tampilkan hasil
    if (!$error) {
        echo "<h3>✅ Data Berhasil Diterima!</h3>";
        echo "Nama: " . $nama . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Kelas: " . $kelas . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form dengan Validasi</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .error { color: red; font-size: 14px; }
        input { padding: 5px; margin: 5px 0; width: 200px; }
        .container { max-width: 400px; }
    </style>
</head>
<body>

    <div class="container">
        <h2>📝 Form Data Siswa</h2>

        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" placeholder="Masukkan nama"
                   value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
            <?php if (isset($error_nama)) echo "<div class='error'>$error_nama</div>"; ?>
            <br>

            <label>Email:</label><br>
            <input type="email" name="email" placeholder="Masukkan email"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <?php if (isset($error_email)) echo "<div class='error'>$error_email</div>"; ?>
            <br>

            <label>Kelas:</label><br>
            <input type="text" name="kelas" placeholder="Masukkan kelas"
                   value="<?php echo isset($_POST['kelas']) ? htmlspecialchars($_POST['kelas']) : ''; ?>">
            <?php if (isset($error_kelas)) echo "<div class='error'>$error_kelas</div>"; ?>
            <br><br>

            <button type="submit">Kirim</button>
        </form>
    </div>

</body>
</html>