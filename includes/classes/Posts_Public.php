<?php

    class Posts_Public extends DB {

        public function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }

        public function getPosts() : array {
            $Q = $this->con->prepare("SELECT * FROM posts WHERE private=0 AND banned=0 ORDER BY date DESC");
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
