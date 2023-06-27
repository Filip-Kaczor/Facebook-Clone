<?php
    include("config/config.php");
    include("includes/abstracts/DB.php");
    include("includes/classes/User.php");
    include("includes/classes/Tools.php");
    include("includes/classes/Modal.php");
    include("includes/classes/Account.php");
    include("includes/classes/Posts.php");
    include("includes/classes/Posts_Following.php");
    include("includes/classes/Posts_Friends.php");
    include("includes/classes/Posts_Public.php");
    include("includes/classes/Posts_Profile.php");
    include("includes/classes/Posts_Single.php");
    include("includes/classes/Post.php");
    include("includes/classes/Stories.php");
    include("includes/classes/Story.php");

    $modal = new Modal($con, $userLoggedIn);
    $user = new User($con, $userLoggedIn, NULL);
    $account = new Account($con);
?>