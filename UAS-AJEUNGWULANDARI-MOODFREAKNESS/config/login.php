<?php

session_start();
include 'koneksi.php';

if (isset($_POST['submit'])){
    try {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username=:username AND password=:password";
        $query = $db_conn->prepare($sql);
        $query->bindParam('username', $username);
        $query->bindParam('password', $password);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($query->rowCount() > 0) {
            $_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$results[0]['id'];
            $_SESSION['role']=$results[0]['role'];
            header('Location:../catalog-list.php');
        }else{
            header('Location:../Login.html');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
}
?>