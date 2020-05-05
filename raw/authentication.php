<?php
include_once 'objects/user.php';

$user = new User($db);

    if (isset($_GET['q'])){
        $user->user_logout();
        header('location:login.php');
    }

    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
?>