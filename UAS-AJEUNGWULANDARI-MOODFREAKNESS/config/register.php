<?php

session_start();
require_once 'koneksi.php';

if(isset($_POST['submit'])){
    try {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = 1;
        $sql = "INSERT INTO user(username, email, password, role) VALUES(:fusername, :femail, :fpassword, :frole)";
        $query = $db_conn->prepare($sql);
        $query->bindParam('fusername', $username);
        $query->bindParam('femail', $email);
        $query->bindParam('fpassword', $password);
        $query->bindParam('frole', $role);
        $query->execute();

        header('Location:../Login.html');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>