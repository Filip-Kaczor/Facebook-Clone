<?php

    class Posts_Profile extends DB {

        public function __construct($con, $userLoggedIn, $username) {
            Parent::__construct($con, $userLoggedIn);
            $this->username = $username;
            $this->user = new User($con, $username, NULL);
        }

        public function getPosts() : array {
            $user_id = $this->user->getId();
            $Q = $this->con->prepare("SELECT * FROM posts WHERE private=0 AND banned=0 AND user_id = $user_id");
            $Q->execute();

            $return = $Q->fetchAll(PDO::FETCH_ASSOC);

            $postsId = array();
            foreach($return as $R) {
                array_push($postsId, $R['id']);
            }

            $postsId = implode(",", $postsId);
            
            return array($postsId, $return);
        }

    }

?>
