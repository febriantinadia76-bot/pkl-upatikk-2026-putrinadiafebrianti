<?php
require_once 'koneksi.php';

$errors = array();
$nama = $email = $kelas = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ===== VALIDASI NAMA =====
    if (isset($_POST['nama']) && !empty($_POST['nama'])) {
        $nama = trim($_POST['nama']);
        if (strlen($nama) < 3) {
            $errors['nama'] = "Nama minimal 3 karakter!";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $errors['nama'] = "Nama hanya boleh huruf dan spasi!";
        } else {
            $nama = htmlspecialchars($nama);
        }
    } else {
        $errors['nama'] = "Nama harus diisi!";
    }

    // ===== VALIDASI EMAIL =====
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Format email tidak valid!";
        } else {
            $email = htmlspecialchars($email);
        }
    } else {
        $errors['email'] = "Email harus diisi!";
    }

    // ===== VALIDASI KELAS =====
    if (isset($_POST['kelas']) && !empty($_POST['kelas'])) {
        $kelas = htmlspecialchars(trim($_POST['kelas']));
    } else {
        $errors['kelas'] = "Kelas harus diisi!";
    }

    // ===== SIMPAN KE DATABASE =====
    if (count($errors) == 0) {
        $sql = "INSERT INTO siswa (nama, email, kelas) VALUES (:nama, :email, :kelas)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $nama,
            ':email' => $email,
            ':kelas' => $kelas
        ]);

        // ===== PRG (Post-Redirect-Get) =====
        header("Location: daftar-siswa.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .error { color: red; font-size: 14px; }
        input { padding: 5px; width: 250px; margin: 5px 0; }
        .container { max-width: 400px; }
        button { padding: 8px 15px; background: #574caf; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>

    <div class="container">
        <h2> Tambah Siswa</h2>

        <?php if (count($errors) > 0): ?>
            <div style="background: #ffe6e6; padding: 10px; border-radius: 5px;">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li class="error"><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <br>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="nama" placeholder="Minimal 3 huruf"
                   value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
            <br>

            <label>Email:</label><br>
            <input type="email" name="email" placeholder="email@domain.com"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            <br>

            <label>Kelas:</label><br>
            <input type="text" name="kelas" placeholder="Contoh: XII RPL"
                   value="<?php echo isset($_POST['kelas']) ? htmlspecialchars($_POST['kelas']) : ''; ?>">
            <br><br>

            <button type="submit">Simpan</button>
            <a href="daftar-siswa.php">Kembali</a>
        </form>
    </div>

</body>
</html>