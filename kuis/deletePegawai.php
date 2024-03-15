<?php
include 'index.php';

if (!isset($_GET['id'])) {
    header("Location: lihatPegawai.php");
    exit();
}

$id = $_GET['id'];

deletePegawai($id);

header("Location: lihatPegawai.php");
exit();