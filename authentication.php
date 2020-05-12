<?php
include_once 'objects/user.php';

$user = new User($db);

if (isset($_GET['q'])) {
    $user->user_logout();
    echo ("<script>location.href = 'index.php';</script>");
}

if (!isset($_SESSION['user_id'])) {
    // header('location:index.php');
    echo ("<script>location.href = 'index.php';</script>");
}

if ($_SESSION['role'] != 'admin') {
    // header('location:index.php');
    echo ("<script>location.href = 'index.php';</script>");
}
