<?php 
session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>OTC - Home</title>
  <?php include_once('./components/base/stylesheets.php') ?>
</head>

<body>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="./index.php">OTC</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId1" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">Hello <?php $user->get_fullname($uid); ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdownId1">
              <a class="dropdown-item" href="index.php?q=logout">Logout</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>

      </div>
    </nav>
  </header>
  <br>
  <section class="container">
    <div class="card">
      <div class="card-body">
        <div class="card-columns">
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php include_once('./components/base/scripts.php') ?>

</body>

</html>