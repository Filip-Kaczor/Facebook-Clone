<?php
    include("../../config/config.php");
    require_once("../../../autoload.php");

    use models\classes\Links;

    if(isset($_GET['id'])) {
        $links = new Links($con, $userLoggedIn, $_GET['id']);

        echo '<div class="show-option-box">
                <a href="'.$links->getLink("profile").'"><div class="post-option pointer prevent-select"><i class="fa-solid fa-link"></i>Page post</div></a>
                <div class="post-option pointer prevent-select" onclick="copy(\''.$_GET['id'].'\')"><i class="fa-regular fa-copy"></i>Copy post</div>
                <div class="post-option pointer prevent-select"><i class="fa-solid fa-exclamation"></i>Report post</div>
              </div>';
    }

?>