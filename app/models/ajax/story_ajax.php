<?php
    include("../../config/config.php");
    require_once("../../../autoload.php");

    use models\classes\User;

    if(isset($_POST['id'])) {
        $storyId = $_POST['id'];
        $Q = $con->prepare("SELECT * FROM stories WHERE id = :storyId");
        $Q->bindParam(":storyId", $storyId);
        $Q->execute();
        $R = $Q->fetch();

        $user = new User($con, NULL, $R['user_id']);

        //$hashtagsArray = explode(",", $R['hashtags']);

        //$hashtagsQ = $con->prepare("SELECT * FROM hashtags WHERE id = :hashtagId");
        //$hashtagsQ->bindParam(":hashtagId", $hashtagId);
        //$hashtagsQ->execute();
        //$hashtagsR = $hashtagsQ->fetch();

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

        $array = array($type, $info, $R['file'], $R['text'], "hashtags", $user->getUsername(), $user->getImage_1());

        echo json_encode($array);
    }

?>