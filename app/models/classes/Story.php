<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Story extends DB {

        private $storyId;

        function __construct($con, $userLoggedIn, $storyId) {
            Parent::__construct($con, $userLoggedIn);
            $this->storyId = $storyId;
        }

        public function getStory() {

            $Q = $this->con->prepare("SELECT * FROM stories WHERE id = :storyId");
            $Q->bindParam(":storyId", $this->storyId);
            $Q->execute();
            $R = $Q->fetch();

            $file = $R['file'];

            if(pathinfo($file, PATHINFO_EXTENSION) == "webp") {
                $file = '<img src="'.$file.'">';
            }else if(pathinfo($file, PATHINFO_EXTENSION) == "webm"){
                $file = '<video autoplay muted loop>
                                <source src="'.$file.'" type="video/webm">
                            </video>';
            }

            $user = new User($this->con, NULL, $R['user_id']);

            $return = "<div class='swiper-slide story transition radius3'>
                            <div class='story-content transition'>
                                ".$file."
                            </div>
                            <div class='story-user-img user-img radius4'>
                                <a href='/@".$user->getUsername()."'><img src=".$user->getImage_1()." class='transition radius4'></a>
                            </div>
                            <div class='story-user-username'>
                                ".$user->getUsername()."
                            </div>
                            <div class='shadow' onclick='openModal(\"story\", ".$R['id'].", true)'></div>
                        </div>";

            return $return;
        }

    }

?>