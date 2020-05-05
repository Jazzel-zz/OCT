<?php
include_once 'objects/user.php';

$user = new User($db);

    if (isset($_GET['q'])){
        $user->user_logout();
        echo("<script>location.href = 'index.php';</script>");
    }

    if(!isset($_SESSION['login'])){
        // header('location:index.php');
        echo("<script>location.href = 'index.php';</script>");

    }
?>