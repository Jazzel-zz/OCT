  <?php
    $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Home 1 - Vincent</title>

      <link rel="stylesheet" href="./assets/base/css/kube.css">
      <link rel="stylesheet" href="./assets/base/css/font-awesome.css">
      <link rel="stylesheet" href="./assets/base/css/owl.carousel.min.css">
      <link rel="stylesheet" href="./assets/base/css/style.css">

      <link rel="stylesheet" href="./assets/base/css/bootstrap.min.css" />

      <link rel="stylesheet" href="./assets/base/css/custom.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Google Tag Manager -->
      <script>
          (function(w, d, s, l, i) {
              w[l] = w[l] || [];
              w[l].push({
                  'gtm.start': new Date().getTime(),
                  event: 'gtm.js'
              });
              var f = d.getElementsByTagName(s)[0],
                  j = d.createElement(s),
                  dl = l != 'dataLayer' ? '&l=' + l : '';
              j.async = true;
              j.src =
                  'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
              f.parentNode.insertBefore(j, f);
          })(window, document, 'script', 'dataLayer', 'GTM-5G6PPWB');
      </script>
      <!-- End Google Tag Manager -->
  </head>

  <body class="vincent_home6 vincent_home1">
      <?php include_once('./base_navigation.php');  ?>