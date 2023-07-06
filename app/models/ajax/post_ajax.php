<?php
    include("../../config/config.php");
    require_once("../../../autoload.php");

    use models\classes\User;

    if(isset($_POST['id'])) {
        $postId = $_POST['id'];
        $Q = $con->prepare("SELECT * FROM posts WHERE id = :postId");
        $Q->bindParam(":postId", $postId);
        $Q->execute();
        $R = $Q->fetch();

        //date_sponsored
        if($R['sponsored'] == "0") {
            $info = date("Y-m-d", strtotime($R['date']));
        }else {
            $info = "Sponsored";
        }

        //type
        if(pathinfo($R['file'], PATHINFO_EXTENSION) == "webp") {
            $type = 'img';
        }else if(pathinfo($R['file'], PATHINFO_EXTENSION) == "webm") {
            $type = 'video';
        }

        $user = new User($con, NULL, $R['user_id']);

        $array = array($type, $info, $R['file'], "", "hashtags", $user->getUsername(), $user->getImage_1());

        echo json_encode($array);
    }

?>