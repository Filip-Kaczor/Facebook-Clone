<?php
    include("../../config/config.php");
    include("../../../autoload.php");
    use models\classes\Modal;

    $modal = new Modal($con, $userLoggedIn);

    //echo $modal->getModal_2();

    echo $modal->getModal_3();
?>