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
                Tambah Katalog
            </div>

            <div class="card-body">
                <form action="config/tambah-katalog.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Item</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Deskripsi</label>
                        <textarea name="desc" class="form-control" id="" cols="20" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <input type="submit" class="btn btn-primary" value="SUBMIT" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>