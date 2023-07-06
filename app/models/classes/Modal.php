<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Modal extends DB {

        function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }
        
        public function getModal_2() {
            $return = "";
            if($this->userLoggedIn != "anonim")
                $return = "<div class='div'>
                                <div class='modal1 m1 userModal radius1' data-aos='fade-right'>
                                    <img src='".$this->user->getImage_1()."' class='radius2'>
                                    <div class='userModal2'>
                                        <span class='userModalFN'>".$this->user->getFullName()."</span>
                                        <span class='userModalUN'>@".$this->user->getUsername()."</span>
                                    </div>
                                </div>
                            </div>";
            else
                $return = "";

            return $return;
        }

        public function getModal_3() {
            $return = "<div class='div'>
                            <div class='modal1 m1 radius3 selectDisable'>
                                <div class='navModal2'>
                                    <a href='/' class='navModalOption'><i class='fa-solid fa-house navModalIcon'></i>HOME</a>
                                    <a href='/people' class='navModalOption'><i class='fa-solid fa-users navModalIcon'></i>People</a>
                                    <a href='/photos' class='navModalOption'><i class='fa-solid fa-images navModalIcon'></i>Photos</a>
                                    <a href='/news-feed' class='navModalOption'><i class='fa-solid fa-newspaper navModalIcon'></i>News feed</a>
                                    <!--<span class='navModalOption' onclick=\"openPage('".$_SESSION['indexUrl'].$this->userLoggedIn."/".$this->user->getUsername()."', '5')\"><i class='fa-solid fa-user'></i>Profile<div class='info infoBlue infoNavMain'>2</div></span>-->
                                    <a href='/settings' class='navModalOption'><i class='fa-solid fa-gears navModalIcon'></i>Settings</a>
                                </div>
                            </div>
                        </div>";

            return $return;
        }

    }


?>