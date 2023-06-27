<?php
    include("includes/includedFiles.php");

    $posts = new Posts($con, $userLoggedIn, $post_id, "SINGLE");

    echo $posts->getPosts();
?>