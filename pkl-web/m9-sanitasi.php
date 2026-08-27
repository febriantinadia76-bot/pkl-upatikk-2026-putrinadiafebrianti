<?php
$daftar_pesan = array();
$pesan_rentan = "";
$pesan_aman = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pesan']) && !empty($_POST['pesan'])) {
        $pesan_rentan = $_POST['pesan']; // VERSI RENTAN
        $pesan_aman = htmlspecialchars($_POST['pesan']); // VERSI AMAN
        $daftar_pesan[] = $pesan_aman;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo XSS</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .box-rentan { background: #ffe6e6; padding: 10px; border-left: 5px solid red; }
        .box-aman { background: #e6ffe6; padding: 10px; border-left: 5px solid green; }
        .pesan-item { background: #f0f0f0; padding: 8px; margin: 5px 0; border-radius: 5px; }
        input { padding: 8px; width: 60%; }
        button { padding: 8px 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>🛡️ Demo XSS - Sanitasi Output</h1>

    <form method="POST" action="">
        <input type="text" name="pesan" placeholder="Ketik sesuatu..."
               value="<?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?>">
        <button type="submit">Kirim</button>
    </form>

    <hr>

    <h3>🔴 VERSI RENTAN (Tanpa htmlspecialchars)</h3>
    <div class="box-rentan">
        <?php if (!empty($pesan_rentan)): ?>
            <p><strong>Pesan:</strong> <?php echo $pesan_rentan; ?></p>
        <?php else: ?>
            <p style="color:#999;">Belum ada pesan.</p>
        <?php endif; ?>
    </div>

    <h3>🟢 VERSI AMAN (Dengan htmlspecialchars)</h3>
    <div class="box-aman">
        <?php if (!empty($pesan_aman)): ?>
            <p><strong>Pesan:</strong> <?php echo $pesan_aman; ?></p>
        <?php else: ?>
            <p style="color:#999;">Belum ada pesan.</p>
        <?php endif; ?>
    </div>

    <h3>📨 Kotak Masuk Pesan</h3>
    <?php foreach ($daftar_pesan as $pesan): ?>
        <div class="pesan-item"><?php echo $pesan; ?></div>
    <?php endforeach; ?>

    <hr>

    <h3>📌 Catatan Penting</h3>
    <ul>
        <li><b>Validasi saat menerima:</b> Cek apakah data sesuai aturan.</li>
        <li><b>Sanitasi saat menampilkan:</b> Gunakan <code>htmlspecialchars()</code>.</li>
        <li><b>Jangan pernah percaya input pengguna!</b></li>
    </ul>

</body>
</html>
