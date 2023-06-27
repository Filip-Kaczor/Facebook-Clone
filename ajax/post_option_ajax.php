<?php
    include("../config/config.php");
    include('../includes/abstracts/DB.php');
    include('../includes/classes/User.php');
    include('../includes/classes/Tools.php');
    include('../includes/classes/Links.php');

    if(isset($_GET['postId'])) {
        $links = new Links($con, $userLoggedIn, $_GET['postId']);

        echo '<div class="post-option-box">
                <a href="'.$links->getPostLink().'"><div class="post-option pointer prevent-select"><i class="fa-solid fa-link"></i>Page post</div></a>
                <div class="post-option pointer prevent-select" onclick="copy(\''.$_GET['postId'].'\')"><i class="fa-regular fa-copy"></i>Copy post</div>
                <div class="post-option pointer prevent-select"><i class="fa-solid fa-exclamation"></i>Report post</div>
              </div>';
    }

?>