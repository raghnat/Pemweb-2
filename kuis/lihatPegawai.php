<?php
include 'index.php';

$employees = lihatPegawai();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    button {
        margin: 3px;
    }

    a {
        text-decoration: none;
        list-style: none;
        color: chocolate;
        font-weight: 700;

    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;

    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h2>Daftar Pegawai</h2>
    <button>
        <a href="addPegawai.php">Tambah Pegawai</a>
    </button>
    <table>
        <thead>
            <tr>
                <th>Aksi</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td>
                    <button>
                        <a href="editPegawai.php?id=<?=$employee['id_pegawai'];?>">Ubah</a>
                    </button>

                    <button>
                        <a href="deletePegawai.php?id=<?=$employee['id_pegawai'];?>">Hapus</a>
                    </button>
                </td>
                <td><?=$employee['id_pegawai'];?></td>
                <td><?=$employee['nama'];?></td>
                <td><?=$employee['jabatan'];?></td>
                <td><?=$employee['gaji'];?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>