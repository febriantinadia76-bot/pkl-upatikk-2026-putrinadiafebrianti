<?php
// =====================
// 1. VARIABEL & TIPE DATA
// =====================
$nama = "Putri Nadia Febrianti";
$umur = 17;
$kelas = "XII RPL";
$nilai = 85.5;

echo "<h3>1. Variabel</h3>";
echo "Nama: " . $nama . "<br>";
echo "Umur: " . $umur . " tahun<br>";
echo "Kelas: " . $kelas . "<br>";
echo "Nilai: " . $nilai . "<br><br>";

// =====================
// 2. PERCABANGAN (IF-ELSE)
// =====================
echo "<h3>2. Percabangan (Grade Nilai)</h3>";
$nilai_ujian = 85;

if ($nilai_ujian >= 90) {
    echo "Grade A (Sangat Baik)<br><br>";
} elseif ($nilai_ujian >= 75) {
    echo "Grade B (Baik)<br><br>";
} elseif ($nilai_ujian >= 60) {
    echo "Grade C (Cukup)<br><br>";
} else {
    echo "Grade D (Tidak Lulus)<br><br>";
}

// =====================
// 3. PERULANGAN (FOR, WHILE, FOREACH)
// =====================
echo "<h3>3. Perulangan</h3>";

// FOR
echo "<b>FOR (1-5):</b><br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Angka: " . $i . "<br>";
}

// WHILE
echo "<br><b>WHILE (1-5):</b><br>";
$j = 1;
while ($j <= 5) {
    echo "While: " . $j . "<br>";
    $j++;
}

// FOREACH
echo "<br><b>FOREACH (Array Warna):</b><br>";
$warna = array("Merah", "Kuning", "Hijau", "Biru");
foreach ($warna as $w) {
    echo "Warna: " . $w . "<br>";
}

// =====================
// 4. ARRAY
// =====================
echo "<br><h3>4. Array</h3>";

// Array Berindeks
echo "<b>Array Berindeks (Buah):</b><br>";
$buah = array("Apel", "Jeruk", "Mangga", "Pisang");
foreach ($buah as $b) {
    echo "Buah: " . $b . "<br>";
}

// Array Asosiatif
echo "<br><b>Array Asosiatif (Siswa):</b><br>";
$siswa = array(
    "nama" => "Budi",
    "kelas" => "XII RPL",
    "nilai" => 85
);
echo "Nama: " . $siswa["nama"] . "<br>";
echo "Kelas: " . $siswa["kelas"] . "<br>";
echo "Nilai: " . $siswa["nilai"] . "<br><br>";

// =====================
// 5. ARRAY BERISI ARRAY (SESI SIANG)
// =====================
echo "<h3>5. Array Berisi Array (5 Siswa)</h3>";

$daftar_siswa = array(
    array("nama" => "Budi", "kelas" => "XII RPL", "nilai" => 85),
    array("nama" => "Siti", "kelas" => "XII RPL", "nilai" => 90),
    array("nama" => "Andi", "kelas" => "XI RPL", "nilai" => 78),
    array("nama" => "Rina", "kelas" => "XII RPL", "nilai" => 92),
    array("nama" => "Doni", "kelas" => "XI RPL", "nilai" => 65)
);

echo "<b>Daftar Siswa:</b><br>";
foreach ($daftar_siswa as $siswa) {
    echo "Nama: " . $siswa["nama"] . " | Kelas: " . $siswa["kelas"] . " | Nilai: " . $siswa["nilai"] . "<br>";
}

// Rata-rata
$total = 0;
foreach ($daftar_siswa as $siswa) {
    $total += $siswa["nilai"];
}
$rata = $total / count($daftar_siswa);
echo "<br><b>Rata-rata nilai: " . round($rata, 2) . "</b><br>";

// Nilai tertinggi
$nilai_tertinggi = 0;
$siswa_tertinggi = "";
foreach ($daftar_siswa as $siswa) {
    if ($siswa["nilai"] > $nilai_tertinggi) {
        $nilai_tertinggi = $siswa["nilai"];
        $siswa_tertinggi = $siswa["nama"];
    }
}
echo "<b>Siswa dengan nilai tertinggi: " . $siswa_tertinggi . " (" . $nilai_tertinggi . ")</b><br>";
?>