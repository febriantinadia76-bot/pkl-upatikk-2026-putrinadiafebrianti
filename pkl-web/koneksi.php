<?php
$host = 'localhost';
$dbname = 'sekolah';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //echo "Koneksi berhasil!"; 

} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>