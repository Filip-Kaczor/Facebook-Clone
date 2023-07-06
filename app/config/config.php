<?php
  ob_start();
  session_start();

  $timezone = date_default_timezone_set("Europe/Warsaw");

  try {
    $con = new PDO("mysql:dbname=facebook_clone;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }
  catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }

  if(isset($_SESSION["userLoggedIn"])){
    $userLoggedIn = $_SESSION["userLoggedIn"];
    $query = $con->prepare("SELECT * FROM users WHERE username=:un");
    $query->bindParam(":un", $userLoggedIn);

    $query->execute();

    if($query->rowCount() == 1) {
      $userLoggedIn = $_SESSION["userLoggedIn"];
    }else {
      session_destroy();
      $userLoggedIn = "anonim";
    }
  }else {
    $userLoggedIn = "anonim";
  }

  //CONFIG VARIABLE
  $indexUrl = "http://localhost/Facebook-Clone/";
  $_SESSION["indexUrl"] = $indexUrl;
  
?>