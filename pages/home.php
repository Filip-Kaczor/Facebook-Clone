<?php
    include("includes/includedFiles.php");

    $stories = new Stories($con, $userLoggedIn);
    $posts = new Posts($con, $userLoggedIn, NULL, "ALL");

    echo $stories->getStories(10);
    echo $posts->getPosts();
?>