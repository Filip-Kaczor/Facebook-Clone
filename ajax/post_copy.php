<?php
    include('../config/config.php');
    include('../includes/abstracts/DB.php');
    include('../includes/classes/User.php');
    include('../includes/classes/Tools.php');
    include('../includes/classes/Links.php');

    if(isset($_GET['id'])) {
        $links = new Links($con, $userLoggedIn, $_GET['id']);

        echo $_SESSION["indexUrl"].$links->getPostLink();
    }