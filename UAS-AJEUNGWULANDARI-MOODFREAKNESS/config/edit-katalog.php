<?php
require_once 'koneksi.php';

try {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = $db_conn->prepare("UPDATE katalog SET 
    nama='$nama', 
    harga='$harga', 
    stok='$stok' WHERE id = :id ");

    $sql->bindParam(":id", $_POST['id']);
    $sql->execute();
    header('Location:../katalog.php');
    // echo $sql->rowCount()."Record Updated";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>