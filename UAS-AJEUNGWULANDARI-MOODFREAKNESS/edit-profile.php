<?php

include 'config/koneksi.php';
session_start();
$id = $_SESSION['id'];
$sql = $db_conn->prepare("SELECT * FROM user WHERE id = :id");
$sql->bindParam(":id", $id);
$sql->execute();

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
                Edit Profile
            </div>

            <div class="card-body">
                <form action="config/edit-profile.php" method="post" enctype="multipart/form-data">
                    <?php
                while($r = $sql->fetch()):
                ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Username</label>
                        <input type="hidden" name="id" value="<?=$r['id'];?>">
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?=$r['username'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$r['email'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="SUBMIT" name="submit">
                    <?php
                    endwhile;
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>