<!DOCTYPE html>
<?php
  include("app/config/config.php");
  include("autoload.php");

  //javasript username
  echo "<script>userLoggedIn = '$userLoggedIn';console.log('username: $userLoggedIn');</script>";

?>
<html lang="pl">

  <head>
    <meta charset="UTF-8">
    <base href="<?php echo $indexUrl; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="icon" href="public/img/icons/facebook1.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/nav.css">
    <link rel="stylesheet" href="public/css/modal.css">
    <link rel="stylesheet" href="public/css/stories.css">
    <link rel="stylesheet" href="public/css/posts.css">

    <link href="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/6b97e637dc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  </head>

  <body>

    <?php include("modal.php"); ?>

    <?php include("nav.php"); ?>

    <main id="main">