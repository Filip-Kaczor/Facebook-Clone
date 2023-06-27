<?php

    class Posts extends DB {

        private $data, $type;

        public function __construct($con, $userLoggedIn, $data, $type) {
            Parent::__construct($con, $userLoggedIn);
            $this->data = $data;
            $this->type = $type;
        }

        public function getPosts() {

            //get class by type and login option
            if($this->type == "ALL") {

                if($this->userLoggedIn == "anonim") {
                    $posts = new Posts_Public($this->con, $this->userLoggedIn);
                }else {
                    $posts = new Posts_Following($this->con, $this->userLoggedIn);
                }

            }else if($this->type == "PROFILE") {
                $posts = new Posts_Profile($this->con, $this->userLoggedIn, $this->data);
            }else if($this->type == "SINGLE") {
                $posts = new Posts_Single($this->con, $this->userLoggedIn, $this->data);
            }

            //get posts ASSOCIATIVE ARRAY by TYPE
            $array = $posts->getPosts();

            $return = '<div id="posts" class="div2" posts="'.$array[0].'">';

            //foreach $postsArray array
            foreach($array[1] as $R) {
                
                //
                $post = new Post($this->con, $this->userLoggedIn, $R);

                //add post to $result
                $return .= $post->getPost();
            }

            $return .= '</div>';

            return $return;
        }
        
    }

?>