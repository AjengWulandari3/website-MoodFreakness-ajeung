<?php
require_once 'koneksi.php';

if (isset($_REQUEST['submit'])) {
    try {
        $nama = $_REQUEST['nama'];
        $harga = $_REQUEST['harga'];
        $stok = $_REQUEST['stok'];
        $desc = $_REQUEST['desc'];


        $foto = $_FILES["foto"]["name"];
        $type = $_FILES["foto"]["type"];
        $size = $_FILES["foto"]["size"];
        $temp = $_FILES["foto"]["tmp_name"];

        $path = "upload/".$foto;

        move_uploaded_file($temp, "../upload/".$foto);
        $insert = $db_conn->prepare("INSERT INTO katalog(nama, `desc`, harga, stok, foto) VALUES(:fnama, :fdesc, :fharga, :fstok, :ffoto)");
        $insert->bindParam(':fnama', $nama);
        $insert->bindParam(':fdesc', $desc);
        $insert->bindParam(':fharga', $harga);
        $insert->bindParam(':fstok', $stok);
        $insert->bindParam(':ffoto', $foto);

        if($insert->execute())
        {
            $insertmsg = "Berhasil!";
            header("Location:../tambah-katalog.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>