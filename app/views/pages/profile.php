<?php
    include("../config/config.php");
    include("../../autoload.php");

    use models\classes\Profile;
    use models\classes\Stories;
    use models\classes\Posts;

    $profile = new Profile($con, $userLoggedIn, $username);
    $stories = new Stories($con, $userLoggedIn);
    $posts = new Posts($con, $userLoggedIn, $username, "PROFILE");

    echo $profile->getProfile();
    echo $stories->getStories(10);
    echo $posts->getPosts();
?>

<style><?php include_once("../../public/css/profile.css"); ?></style>