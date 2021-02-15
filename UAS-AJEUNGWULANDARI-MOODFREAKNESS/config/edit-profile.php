<?php
require_once 'koneksi.php';

try {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = $db_conn->prepare("UPDATE user SET 
    username='$username', 
    email='$email', 
    password='$password' WHERE id = :id ");

    $sql->bindParam(":id", $_POST['id']);
    $sql->execute();
    header('Location:../edit-profile.php');
    // echo $sql->rowCount()."Record Updated";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>