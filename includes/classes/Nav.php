<?php

    class Nav extends DB {

        public function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }

        public function getNav() {
            if($this->userLoggedIn == "anonim") {
                $nav = "<a href='/login' role='link' tabindex='0'><span class='pointer radius1 marginL navButton2'>Zaloguj się</span></a>
                        <a href='/register' role='link' tabindex='0'><span class='pointer radius1 marginL navButton1'>Stwórz konto</span></a>";
            }else {
                $nav = "<div id='navAdd' class='add radius1 flex marginL pointer navButton1'>
                            <i class='fa-solid fa-plus'></i>
                            Create
                        </div>
                
                        <div id='navProfile' class='profile marginL'>
                            <a href='/@".$this->userLoggedIn."'><img role='link' tabindex='0' src='".$this->user->getImage_1()."' alt='' class='pointer radius1'></a>
                        </div>";
            }
            return $nav;
        }

    }

?>