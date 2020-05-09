<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
     <?php echo "OTC - {$page_title}"; ?>        
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Pacifico&display=swap" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    * {
      font-family: 'Acme';
    }
    .styled-font { 
      font-family : 'Pacifico' !important;
    }
  </style>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="index.php" class="simple-text logo-mini">
            OCT
          </a>
          <a href="index.php" class="simple-text logo-normal">
            Online Cosmetics
          </a>
        </div>
        <ul class="nav">
          <!-- <li <?php echo $page_title=="Dashboard" ? "class='active'" : ""; ?>>
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li> -->
          <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?>>
            <a href="./products.php">
              <i class="tim-icons icon-notes"></i>
              <p>Products</p>
            </a>
          </li>
          <li <?php echo $page_title=="Categories" ? "class='active'" : ""; ?>>
            <a href="./categories.php">
              <i class="tim-icons icon-paper"></i>
              <p>Categories</p>
            </a>
          </li>
          <li <?php echo $page_title=="Admin" ? "class='active'" : ""; ?>>
            <a href="./user_functions.php">
              <i class="tim-icons icon-settings-gear-63"></i>
              <p>Admin functions</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./index.php">
              <i class="tim-icons icon-spaceship"></i>
              <p>Go back to site</p>
            </a>
          </li>
        </ul>
        
      </div>
    </div>
 
    <div class="main-panel">
<?php include_once('./dashboard_navigation.php'); ?>