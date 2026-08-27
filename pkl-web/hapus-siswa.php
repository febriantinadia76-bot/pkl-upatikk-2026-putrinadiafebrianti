<?php
require_once 'koneksi.php';

// Ambil ID dari POST
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id <= 0) {
    die("ID tidak valid!");
}

// Hapus data dengan prepared statement
$stmt = $pdo->prepare("DELETE FROM siswa WHERE id = :id");
$stmt->execute([':id' => $id]);

// Redirect ke daftar siswa
header("Location: daftar-siswa.php");
exit;
?>