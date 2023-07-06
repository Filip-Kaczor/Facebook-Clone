<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Profile extends DB {

        public function __construct($con, $userLoggedIn, $username) {
            Parent::__construct($con, $userLoggedIn);
            $this->username = $username;
            $this->user = new User($con, $username, NULL);
        }

        public function getProfile() {
            $user_id = $this->user->getId();
            $Q = $this->con->prepare("SELECT * FROM posts WHERE user_id = :user_id");
            $Q->bindParam(":user_id", $user_id);
            $Q->execute();
            $posts_number = $Q->rowCount();
            
            if($this->userLoggedIn == $this->username) {
                $user = "1";
            }else {
                $user = "2";
            }

            $return = '<div class="div m1 radius3 profile" data-aos="fade-up" data-aos-offset="200">

                        <div class="profile-top">

                            <div class="profile-option">'.$this->tools->getOption("profile", $this->user->getId()).'</div>

                            <div class="profile-image-2" onclick="openModal(\'profile\', '.$user_id.', true)"><img src="'.$this->user->getImage_2().'"></div>

                            <div class="profile-image-1"><img src="'.$this->user->getImage_1().'"></div>

                        </div>

                        <div class="profile-mid">
                            <div class="profile-fullname">'.$this->user->getFullName().'</div>
                            <div class="profile-username">@'.$this->user->getUsername().'</div>
                        </div>

                        <div class="profile-bot">

                            <div class="profile-info">
                                <div class="profile-info-1">'.$posts_number.'</div>
                                <div class="profile-info-2">Posts</div>
                            </div>

                            <div class="profile-info">
                                <div class="profile-info-1">'.$this->user->getFollowersNumber().'</div>
                                <div class="profile-info-2">Followers</div>
                            </div>

                            <div class="profile-info">
                                <div class="profile-info-1">'.$this->user->getFollowingNumber().'</div>
                                <div class="profile-info-2">Following</div>
                            </div>

                        </div>

                       </div>';

            return $return;
        }

    }

?>