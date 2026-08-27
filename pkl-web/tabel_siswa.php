<?php
// Data siswa
$daftar_siswa = array(
    array("nama" => "Budi", "kelas" => "XII RPL", "nilai" => 85),
    array("nama" => "Siti", "kelas" => "XII RPL", "nilai" => 90),
    array("nama" => "Andi", "kelas" => "XI RPL", "nilai" => 78),
    array("nama" => "Rina", "kelas" => "XII RPL", "nilai" => 92),
    array("nama" => "Doni", "kelas" => "XI RPL", "nilai" => 65)
);


// Fungsi hitung rata-rata
function hitungRata($data) {
    $total = 0;
    foreach ($data as $siswa) {
        $total += $siswa["nilai"];
    }
    return $total / count($data);
}

// Fungsi cari nilai tertinggi
function cariTertinggi($data) {
    $max = 0;
    $nama = "";
    foreach ($data as $siswa) {
        if ($siswa["nilai"] > $max) {
            $max = $siswa["nilai"];
            $nama = $siswa["nama"];
        }
    }
    return array("nama" => $nama, "nilai" => $max);
}

$rata = hitungRata($daftar_siswa);
$tertinggi = cariTertinggi($daftar_siswa);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>

    <h2>📚 Daftar Nilai Siswa</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Nilai</th>
        </tr>

        <?php foreach ($daftar_siswa as $siswa): ?>
        <tr>
            <td><?php echo $siswa["nama"]; ?></td>
            <td><?php echo $siswa["kelas"]; ?></td>
            <td><?php echo $siswa["nilai"]; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>

    <p><b>Rata-rata nilai: <?php echo round($rata, 2); ?></b></p>
    <p><b>Siswa dengan nilai tertinggi: <?php echo $tertinggi["nama"] . " (" . $tertinggi["nilai"] . ")"; ?></b>
</p>

</body>
</html>