<?php

    class Posts_Friends extends DB {

        public function __construct($con, $userLoggedIn) {
            Parent::__construct($con, $userLoggedIn);
        }

        public function getPosts() : array {
            $Q = $this->con->prepare("SELECT * FROM posts WHERE private=0 AND banned=0");
            $Q->execute();

            $return = "";
            while($R = $Q->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post($this->con, $this->userLoggedIn, $R['id']);

                $return .= $post->getPost();
            }

            return $return;
        }

    }

?>
