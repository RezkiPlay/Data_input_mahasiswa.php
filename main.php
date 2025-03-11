<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitas";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $nilai = $_POST['nilai'];
    
    if ($nilai >= 90) {
        $grade = "A+";
    } elseif ($nilai >= 80) {
        $grade = "A";
    } elseif ($nilai >= 70) {
        $grade = "B";
    } elseif ($nilai >= 60) {
        $grade = "C";
    } elseif ($nilai >= 50) {
        $grade = "D";
    } else {
        $grade = "E";
    }
    
    $sql = "INSERT INTO mahasiswa (nama, nim, nilai, grade) VALUES ('$nama', '$nim', '$nilai', '$grade')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Data berhasil disimpan!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ddd; }
        input, button { display: block; width: 100%; margin: 10px 0; padding: 8px; }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Input Data Mahasiswa</h2>
        <label>Nama:</label>
        <input type="text" name="nama" required>
        <label>NIM:</label>
        <input type="text" name="nim" required>
        <label>Nilai:</label>
        <input type="number" name="nilai" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
