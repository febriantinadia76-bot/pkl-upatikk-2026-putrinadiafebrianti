<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nama']) && !empty($_POST['nama']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['kelas']) && !empty($_POST['kelas'])) {
        
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $kelas = htmlspecialchars($_POST['kelas']);
        
        echo "<h3>Data Berhasil Diterima!</h3>";
        echo "Nama: " . $nama . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Kelas: " . $kelas . "<br>";
    } else {
        echo "<p style='color:red;'>Semua field harus diisi!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form POST</title>
</head>
<body>
    <h2>📝 Form Data Siswa</h2>

    <form method="POST" action="">
        <label>Nama:</label><br>
        <input type="text" name="nama" placeholder="Masukkan nama"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Masukkan email"><br><br>

        <label>Kelas:</label><br>
        <input type="text" name="kelas" placeholder="Masukkan kelas"><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>