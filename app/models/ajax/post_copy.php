<?php
    include("../../config/config.php");
    require_once("../../../autoload.php");

    use models\classes\Links;

    if(isset($_GET['id'])) {
        $links = new Links($con, $userLoggedIn, $_GET['id']);

        echo $_SESSION["indexUrl"].$links->getPostLink();
    }