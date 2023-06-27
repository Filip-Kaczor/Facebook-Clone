<?php

    class Posts_Single extends DB {

        public function __construct($con, $userLoggedIn, $data) {
            Parent::__construct($con, $userLoggedIn);
            $this->data = $data;
        }

        public function getPosts() : array {
            $user_id = $this->user->getId();
            $Q = $this->con->prepare("SELECT * FROM posts WHERE id=$this->data");
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
