<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "kuis1_pemweb2";

try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function addPegawai($nama, $jabatan, $gaji)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO pegawai (nama, jabatan, gaji) VALUES (:nama, :jabatan, :gaji)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jabatan', $jabatan);
        $stmt->bindParam(':gaji', $gaji);
        $stmt->execute();
    }

    function lihatPegawai()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM pegawai order by gaji desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function editPegawai($id, $nama, $jabatan, $gaji)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE pegawai SET nama = :nama, jabatan = :jabatan, gaji = :gaji WHERE id_pegawai = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':jabatan', $jabatan);
        $stmt->bindParam(':gaji', $gaji);
        $stmt->execute();
    }

    function deletePegawai($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM pegawai WHERE id_pegawai = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}