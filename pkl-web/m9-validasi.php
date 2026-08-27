<?php
$nama = $email = $umur = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // VALIDASI NAMA
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

    // VALIDASI EMAIL
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

    // VALIDASI UMUR
    if (isset($_POST['umur']) && !empty($_POST['umur'])) {
        $umur = trim($_POST['umur']);
        if (!is_numeric($umur)) {
            $errors['umur'] = "Umur harus angka!";
        } elseif ($umur < 10 || $umur > 100) {
            $errors['umur'] = "Umur harus 10–100 tahun!";
        } else {
            $umur = htmlspecialchars($umur);
        }
    } else {
        $errors['umur'] = "Umur harus diisi!";
    }

    // TAMPILKAN HASIL
    if (count($errors) == 0) {
        echo "<h3 style='color:green;'> Pendaftaran Berhasil!</h3>";
        echo "Nama: $nama <br>";
        echo "Email: $email <br>";
        echo "Umur: $umur <br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .error { color: red; font-size: 14px; }
        input { padding: 5px; width: 250px; margin: 5px 0; }
        .container { max-width: 400px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pendaftaran</h2>

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

        <label>Umur:</label><br>
        <input type="text" name="umur" placeholder="10–100 tahun"
               value="<?php echo isset($_POST['umur']) ? htmlspecialchars($_POST['umur']) : ''; ?>">
        <br><br>

        <button type="submit">Daftar</button>
    </form>
</div>

</body>
</html>