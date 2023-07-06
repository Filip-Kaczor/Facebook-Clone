<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Nav extends DB {

        public function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }

        public function getNavLeft() {
            $return = '<div id="logo" class="logo">
                            <a href="/" ><img src="public/img/icons/facebook2.svg" alt="" class="pointer"></a>
                        </div>';

            return $return;
        }

        public function getNavCenter() {
            $return = '<a href="/" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-house"></i></span></a>
                        <a href="/groups" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-users"></i></span></a>
                        <a href="/watch" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-circle-play"></i></span></a>
                        <a href="/store" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-store"></i></span></a>
                        <a href="/games" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-gamepad"></i></span></a>';
            return $return;
        }

        public function getNavRight() {
            $return = '<div id="search" class="button pointer nav-button radius4 margin1"><i class="fas fa-search"></i></div>';
            
            if($this->user->isLogged()) {
                $return = '<a href="/messenger" ><span class="button pointer nav-button radius4 margin1"><i class="fa-brands fa-facebook-messenger"></i></span></a>
                           <a href="#" ><span class="button pointer nav-button radius4 margin1"><i class="fa-solid fa-bell"></i></span></a>
                
                            <div id="navProfile" class="margin1">
                                <a href="/@'.$this->userLoggedIn.'"><img  src="'.$this->user->getImage_1().'" alt="" class="pointer radius4"></a>
                            </div>';
            }else {
                $return .= '<a href="/login" ><span class="button pointer nav-button radius4 margin1">Zaloguj się</span></a>
                           <a href="/register" ><span class="button pointer nav-button radius4 margin1">Stwórz konto</span></a>';
            }

            return $return;
        }

    }

?>