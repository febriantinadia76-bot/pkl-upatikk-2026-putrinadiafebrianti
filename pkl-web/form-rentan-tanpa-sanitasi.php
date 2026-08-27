<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama']; // TANPA SANITASI
    echo "Nama: $nama";
}
?>

<form method="POST" action="">
    <input type="text" name="nama">
    <button type="submit">Kirim</button>
</form>