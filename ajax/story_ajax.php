<?php
    include("../config/config.php");
    include("../includes/classes/User.php");

    if(isset($_POST['id'])) {
        $storyId = $_POST['id'];
        $Q = $con->prepare("SELECT * FROM stories WHERE id = :storyId");
        $Q->bindParam(":storyId", $storyId);
        $Q->execute();
        $R = $Q->fetch(PDO::FETCH_ASSOC);

        $user = new User($con, NULL, $R['user_id']);

        //$hashtagsArray = explode(",", $R['hashtags']);

        //$hashtagsQ = $con->prepare("SELECT * FROM hashtags WHERE id = :hashtagId");
        //$hashtagsQ->bindParam(":hashtagId", $hashtagId);
        //$hashtagsQ->execute();
        //$hashtagsR = $hashtagsQ->fetch(PDO::FETCH_ASSOC);

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