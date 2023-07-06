<?php
    include("../config/config.php");
    include("../../autoload.php");

    use models\classes\Posts;

    $posts = new Posts($con, $userLoggedIn, $post_id, "SINGLE");

    echo $posts->getPosts();
?>