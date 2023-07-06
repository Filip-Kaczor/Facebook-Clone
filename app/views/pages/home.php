<?php
    include("../config/config.php");
    include("../../autoload.php");

    use models\classes\Stories;
    use models\classes\Posts;

    $stories = new Stories($con, $userLoggedIn);
    $posts = new Posts($con, $userLoggedIn, NULL, "ALL");

    echo $stories->getStories(10);
    echo $posts->getPosts();
?>