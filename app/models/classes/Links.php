<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Links extends DB {

        private $id;

        public function __construct($con, $userLoggedIn, $id) {
            Parent::__construct($con, $userLoggedIn);
            $this->id = $id;
        }

        public function getLink($name) {
            return "/".$name."/".$this->id;
        }

    }

?>