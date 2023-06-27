<?php

    class Links extends DB {

        private $id;

        public function __construct($con, $userLoggedIn, $id) {
            Parent::__construct($con, $userLoggedIn);
            $this->id = $id;
        }

        public function getPostLink() {
            return "/post/".$this->id;
        }

    }

?>