<?php

    class Post extends DB {

        private $postId;

        public function __construct($con, $userLoggedIn, $postArray) {
            Parent::__construct($con, $userLoggedIn,);
            $this->postArray = $postArray;
        }

        public function getPost() {

            $id = $this->postArray['id'];
            $user_id = $this->postArray['user_id'];
            $private = $this->postArray['private'];
            $banned = $this->postArray['banned'];
            $sponsored = $this->postArray['sponsored'];
            $date = $this->postArray['date'];
            $likes = $this->postArray['likes'];
            $comments = $this->postArray['comments'];
            $savings = $this->postArray['savings'];
            $views = $this->postArray['views'];
            $content = $this->postArray['content'];
            $file = $this->postArray['file'];

            $user = new User($this->con, NULL, $user_id);

            //miltimedia
            if($file != NULL) {
                if(pathinfo($file, PATHINFO_EXTENSION) == "webp") {
                    $file = '<img src="'.$file.'" onclick="openModal(\'post\', '.$id.', true)" class="pointer">';
                }else if(pathinfo($file, PATHINFO_EXTENSION) == "webm") {
                    $file = '<video  onclick="openModal(\'post\', '.$id.', true)" class="pointer" autoplay muted loop>
                                <source src="'.$file.'" type="video/webm">
                            </video>';
                }
            }

            //date_sponsored
            if($sponsored == "0") {
                $info = date("Y-m-d", strtotime($date));
            }else {
                $info = "Sponsored";
            }

            $return = '<div class="div m1 radius3 post" post="'.$id.'" data-aos="fade-up" data-aos-offset="200" data-aos-once="true">

                        <div class="post-top">

                            <div class="post-top-left">

                                <div class="post-img user-img radius4">
                                    <a href="" class="post-href"><img src="'.$user->getImage_1().'" class="radius4 transition"></a>
                                </div>

                                <div class="post-user">

                                    <div class="post-user-1">
                                        <a href="/@'.$user->getUsername().'" class="post-href">'.$user->getUsername().'</a>
                                    </div>
                
                                    <div class="post-user-2">'.$info.'</div>
                
                                </div>

                            </div>

                            <div class="post-top-right">
                                <div class="post-options pointer">
                                    <i class="fa-solid fa-ellipsis-vertical" onclick="showPostOption('.$id.')"></i>
                                </div>
                            </div>

                        </div>

                        <div class="post-mid">
                            <div class="post-mid-content">'.$this->getContent($content).'</div>
                            <div class="post-mid-file">'.$file.'</div>
                        </div>

                        <div class="separator"></div>

                        <div class="post-bot">
                            <div class="post-bot-left">
                                <div class="post-bot-option post-like pointer prevent-select"><i class="fa-regular fa-heart"></i>'.$this->tools->thousandsCurrencyFormat($likes).'</div>
                                <div class="post-bot-option post-comment pointer prevent-select"><i class="fa-regular fa-comment"></i>'.$this->tools->thousandsCurrencyFormat($comments).'</div>
                                <div class="post-bot-option post-save pointer prevent-select"><i class="fa-regular fa-bookmark"></i>'.$this->tools->thousandsCurrencyFormat($savings).'</div>
                            </div>

                            <div class="post-bot-right">
                                
                                <div class="post-bot-option post-view prevent-select"><i class="fa-solid fa-chart-simple"></i>'.$this->tools->thousandsCurrencyFormat($views).'</div>
                                <!--<div class="post-share"><i class="fa-solid fa-share"></i></div>
                                <div class="post-iframe"><i class="fa-solid fa-code"></i></div>-->
                            </div>
                        </div>

                       </div>';

            return $return;
        }

        public function getContent($content) {

            $contentArray = explode(" ", $content);
            foreach($contentArray as $key => $value) {
                if(str_contains($value, "#")) {
                    $contentArray[$key] = '<a href="/hashtag/'.str_replace("#", "", $value).'">'.$value.'</a>';
                }else if (str_contains($value, "https://")) {
                    $contentArray[$key] = '<a href="href:'.$value.'"><i class="fa-solid fa-link"></i>Link</a>';
                }
            }
            $return = implode(" ", $contentArray);

            return $return;
        }

    }

?>