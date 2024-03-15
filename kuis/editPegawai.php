<?php
include 'index.php';

if (!isset($_GET['id'])) {
    header("Location: lihatPegawai.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM pegawai WHERE id_pegawai = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    header("Location: lihatPegawai.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];

    editPegawai($id, $nama, $jabatan, $gaji);

    header("Location: lihatPegawai.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
</head>

<body>
    <h2>Edit Pegawai</h2>
    <form method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $employee['nama']; ?>"><br>
        <label for="jabatan">Jabatan:</label><br>
        <input type="text" id="jabatan" name="jabatan" value="<?php echo $employee['jabatan']; ?>"><br>
        <label for="gaji">Gaji:</label><br>
        <input type="text" id="gaji" name="gaji" value="<?php echo $employee['gaji']; ?>"><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>