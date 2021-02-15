<?php

$db_host = 'localhost';
$db_uname = 'root';
$db_pass = '';
$db_name = 'moodfreakness';

try {
    $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_uname, $db_pass);
    $cek = "Koneksi Berhasil";
    // echo $cek;
} catch (PDOException $x) {
    die($x->getMessage());
}

?>