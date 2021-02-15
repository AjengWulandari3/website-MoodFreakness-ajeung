<?php

include 'config/data_katalog.php';
session_start();

if (isset($_SESSION['login']) == 0) {
    header('Location:mainmenu.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <style type="text/css">
        ul {
            margin: 0;
            padding: 0;
            overflow: hidden;
            list-style-type: none;
            background: grey;
            height: 50px;
        }

        li {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 12px 20px;
            text-decoration: none;
        }

        li a:hover {
            color: grey;
        }

        footer {
            background-color: grey;
            text-align: center;
            font-weight: lighter;
            color: black;
            font-size: 13px;
        }

        .textutama {
            margin-top: 30%;
            font-size: 50px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: darkslategrey;
        }

        .button {
            background-color: black;
            height: 50px;
            font-weight: bold;
            width: 50%;
            color: #fff;
            border-radius: 50px;
            display: inline-block;
            text-align: center;
            padding-top: 10px;
            border-color: transparent;
            text-align: center;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="index.html">Home</a></li>
        <?php
        if ($_SESSION['role'] == '0') {
        echo '<li><a href="katalog.php">Data Catalog</a></li>';
        }
        ?>
        <?php
        if ($_SESSION['role'] == '1') {
            echo '<li><a href="edit-profile.php">Edit Profil</a></li>';
        }
        ?>
        <li><a href="catalog-list.php">Catalog</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li style="float: right;"><a href="mailto:ajengwlndr3@gmail.com">Kirim Email ke Ajeng</a></li>
    </ul>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header justify-content-between justify-between">
                Data Katalog Tersimpan
                <a href="tambah-katalog.php" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Item</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = $q->fetch()):
                                $nama = $row['nama'];
                                $harga = $row['harga'];
                                $stok = $row['stok'];
                                $foto = $row['foto'];
                        ?>
                        <tr>
                            <td><?=$nama;?></td>
                            <td><?=$harga;?></td>
                            <td><?=$stok;?></td>
                            <td><img src="upload/<?=$foto?>" alt="" srcset="" class="img-fluid" width="50px"></td>
                            <td>
                                <a href="edit-katalog.php?id=<?=$row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="config/hapus-katalog.php?id=<?=$row['id'];?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin Hapus Data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        
                        endwhile;

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>