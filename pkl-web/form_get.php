<?php
$hasil = "";

// Cek apakah ada data GET
if (isset($_GET['cari']) && !empty($_GET['cari'])) {
    $keyword = htmlspecialchars($_GET['cari']);
    $hasil = "Hasil pencarian untuk: <b>" . $keyword . "</b>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form GET - Pencarian</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input { padding: 8px; width: 250px; }
        button { padding: 8px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
        .hasil { margin-top: 20px; background: #f0f0f0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>Form Pencarian</h2>

    <form method="GET" action="">
        <input type="text" name="cari" placeholder="Kata kunci pencarian..." 
               value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
        <button type="submit">Cari</button>
    </form>

    <?php if (!empty($hasil)): ?>
        <div class="hasil">
            <h3><?php echo $hasil; ?></h3>
        </div>
    <?php endif; ?>

</body>
</html>