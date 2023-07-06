<?php

    namespace models\abstracts;

    use models\classes\User;
    use models\classes\Tools;

    abstract class DB {

        protected $con, $userLoggedIn;

        function __construct($con, $userLoggedIn) {
            $this->con = $con;
            $this->userLoggedIn = $userLoggedIn;
            $this->user = new User($con, $userLoggedIn, NULL);
            $this->tools = new Tools();
        }

    }

?>