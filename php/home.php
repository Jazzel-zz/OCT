<?php
    session_start();

    include_once './components/header.php';
    include_once './components/functions.php';

    $uid =  $_SESSION['login'];
    // $stmt= $user->getFullname($uid);
  
?>
<p>Hello </p>