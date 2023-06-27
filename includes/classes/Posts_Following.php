<?php

    class Posts_Following extends DB {

        public function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }

        public function getPosts() : array {
            $followingArray = $this->user->getFollowing();

            $Q = $this->con->prepare("SELECT * FROM posts WHERE user_id IN($followingArray)");
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