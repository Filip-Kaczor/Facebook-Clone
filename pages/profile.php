<?php
    include("includes/includedFiles.php");
    include("includes/classes/Profile.php");

    $profile = new Profile($con, $userLoggedIn, $username);
    $stories = new Stories($con, $userLoggedIn);
    $posts = new Posts($con, $userLoggedIn, $username, "PROFILE");

    echo $profile->getProfile();
    echo $stories->getStories(10);
    echo $posts->getPosts();
?>

<style><?php include_once("assets/css/profile.css"); ?></style>