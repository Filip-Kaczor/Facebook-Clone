<?php
    include("../config/config.php");
    include("../includes/classes/User.php");

    if(isset($_POST['id'])) {
        $postId = $_POST['id'];
        $Q = $con->prepare("SELECT * FROM posts WHERE id = :postId");
        $Q->bindParam(":postId", $postId);
        $Q->execute();
        $R = $Q->fetch(PDO::FETCH_ASSOC);

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