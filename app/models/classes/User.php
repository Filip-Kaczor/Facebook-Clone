<?php

    namespace models\classes;

    class User {

        private $con, $userLoggedIn, $userId;

        public function __construct($con, $userLoggedIn, $userId) {

            $query = $con->prepare("SELECT * FROM users WHERE id = :userId OR username = :un");
            $query->bindParam(":userId", $userId);
            $query->bindParam(":un", $userLoggedIn);
            $query->execute();

            $this->sqlData = $query->fetch();
        }

        public function getId() {
            return $this->sqlData["id"] ?? 'null';
        }

        public function getInactive() {
            return $this->sqlData["inactive"] ?? 'null';
        }

        public function getVerified() {
            return $this->sqlData["verified"] ?? 'null';
        }

        public function getLastLoggedIn() {
            return $this->sqlData["last_logged_in"] ?? 'null';
        }

        public function getUsername() {
            return $this->sqlData["username"] ?? 'null';
        }

        public function getEmail() {
            return $this->sqlData["email"] ?? 'null';
        }

        public function getPhone() {
            return $this->sqlData["phone"] ?? 'null';
        }

        public function getFirstName() {
            return $this->sqlData["first_name"] ?? 'null';
        }

        public function getLastName() {
            return $this->sqlData["last_name"] ?? 'null';
        }

        public function getFullName() {
            return $this->getFirstName()." ".$this->getLastName();
        }

        public function getSignUpDate() {
            return $this->sqlData["sign_up_date"] ?? 'null';
        }

        public function getImage_1() {
            return $this->sqlData["image_1"] ?? 'null';
        }

        public function getImage_2() {
            return $this->sqlData["image_2"] ?? 'null';
        }

        public function getFriends() {
            return $this->sqlData["friends"] ?? 'null';
        }

        public function getFollowers() {
            return $this->sqlData["followers"] ?? 'null';
        }

        public function getFollowing() {
            return $this->sqlData["following"] ?? 'null';
        }

        public function getPosts() {
            return $this->sqlData["posts"] ?? 'null';
        }

        public function getStories() {
            return $this->sqlData["stories"] ?? 'null';
        }




        public function getFollowersNumber() {
            return count(array_filter(explode(",", $this->getFollowers())));
        }

        public function getFollowingNumber() {
            return count(array_filter(explode(",", $this->getFollowing())));
        }

        public function getFollowingPosts() {
            return count(array_filter(explode(",", $this->getFollowing())));
        }


        public function isLogged() {
            if($this->getUsername() == "null") {
                return false;
            }else {
                return true;
            }
        }

    }
?>