<?php
require_once "koneksi.php";

try {

    $sql = "DELETE FROM katalog WHERE id = '$_GET[id]'";
    $db_conn->exec($sql);
    header('Location:../katalog.php');
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>