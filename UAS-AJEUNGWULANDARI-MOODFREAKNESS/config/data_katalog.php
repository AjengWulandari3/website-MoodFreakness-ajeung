<?php
require_once 'koneksi.php';

try {
    $sql = 'SELECT * FROM katalog';
    $q = $db_conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Tidak bisa membuka database $db_name: ".$e->getMessage());
}

?>