<?php
include 'index.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    if (empty($nama) || empty($jabatan) || empty($gaji)) {
        $error = 'Semua field harus diisi!';
    } else {
        addPegawai($nama, $jabatan, $gaji);

        header("Location: lihatPegawai.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pegawai</title>
</head>

<body>
    <h2>Tambah Pegawai</h2>
    <form method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan" required><br>
        <label for="gaji">Gaji:</label><br>
        <input type="text" id="gaji" name="gaji" required><br><br>
        <button type="submit">Tambah Pegawai</button>
    </form>
    <?php if ($error) {
    echo "<p style='color: red;'>$error</p>";
}
?>
</body>

</html>