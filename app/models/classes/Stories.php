<?php

    namespace models\classes;

    use models\abstracts\DB;

    class Stories extends DB {

        public function getStories($limit) {

            $storiesArray = array();
            $storiesArrayId = 0;
            $return = "";

            if($this->userLoggedIn == "anonim") {
                $Q = $this->con->prepare("SELECT * FROM stories WHERE private=0 AND date >= now() - INTERVAL 1 DAY ORDER BY rand() LIMIT $limit");
                $Q->execute();

                while($R = $Q->fetch()) {
                    $id = $R['id'];
                    array_push($storiesArray, $id);
                    $storiesArrayId++;

                    if($storiesArrayId == $limit) {
                        break;
                    }
                }
            }else {
                $friendsArray = explode(",", $this->user->getFollowers());

                for($i=0;$i<count($friendsArray);$i++) {
                    $Q = $this->con->prepare("SELECT * FROM stories WHERE user_id = :userId AND date >= now() - INTERVAL 1 DAY ORDER BY rand()");
                    $Q->bindParam(":userId", $friendsArray[$i]);
                    $Q->execute();

                    while($R = $Q->fetch()) {
                        $id = $R['id'];
                        array_push($storiesArray, $id);
                        $storiesArrayId++;

                        if($storiesArrayId == $limit) {
                            break;
                        }
                    }
                }

                if($storiesArrayId == 0) {
                    $Q = $this->con->prepare("SELECT * FROM stories WHERE private=0 AND date >= now() - INTERVAL 1 DAY ORDER BY rand() LIMIT $limit");
                    $Q->execute();

                    for($i=0;$i<$limit-1;$i++) {
                        $R = $Q->fetch();
                        $id = $R['id'];
                        array_push($storiesArray, $id); 
                        $storiesArrayId++;

                        if($storiesArrayId == $limit) {
                            break;
                        }
                    }
                }
            }

            $storiesString = implode(",", $storiesArray);

            $return .= '<div id="stories" class="div m1 radius3" stories="'.$storiesString.'" data-aos="fade-up" data-aos-offset="200" data-aos-once="true">
                            <div class="swiper stories">
                                <div class="swiper-wrapper">';

                            if($this->userLoggedIn != "anonim") {
                                $return .= '<div class="swiper-slide story radius3">
                                                <div class="story-content transition">
                                                    <img src="public/stories/add_story.webp">
                                                </div>
                                                <div class="story-add center pointer">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                </div>
                                                <div class="story-user-username bold">
                                                    Add Story
                                                </div>
                                            </div>';
                            }

                    for($i=0;$i<count($storiesArray);$i++) {


                        $story = new Story($this->con, $this->userLoggedIn, $storiesArray[$i]);

                        $return .= $story->getStory();
                    }

            $return .= "</div>
                        <div class='swiper-nav transition swiper-nav-next stories-next'><i class='fa-solid fa-circle-chevron-right'></i></div>
                        <div class='swiper-nav transition swiper-nav-prevs stories-prevs'><i class='fa-solid fa-circle-chevron-left'></i></div>
                        </div>
                        </div>
            
                        <script>
                            var swiper = new Swiper('.stories', {
                            slidesPerView: 'auto',
                            spaceBetween: 10,
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.stories-next',
                                prevEl: '.stories-prevs',  
                            },
                            });
                        </script>";

            return $return;
        }


    }

?>