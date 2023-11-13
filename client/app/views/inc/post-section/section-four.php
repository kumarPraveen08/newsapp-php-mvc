<!-- Start Latest News Slider (using Slick Slider version 1.8.1) -->
<section class="echo-latest-news-area">
        <div class="echo-latest-news-content">
            <div class="container">
                <div class="echo-be-slider-btn">
                    <div class="echo-latest-nw-title">
                        <h4>Latest News</h4>
                    </div>
                    <div class="echo-latest-news-next-prev-btn">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="echo-latest-news-full-content">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php if($data['recentPosts']){
                                foreach($data['recentPosts'] as $post){
                                    echo '<div class="swiper-slide">
                                            <div class="echo-latest-news-main-content">
                                                <div class="echo-latest-news-img img-transition-scale">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                        <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover">
                                                    </a>
                                                </div>
                                                <div class="echo-latest-news-single-title">
                                                    <h5><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="text-capitalize title-hover">'.$post->title.'</a></h5>
                                                </div>
                                                <div class="echo-latest-news-time-views">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }else{
                                echo '<div>No posts found!</div>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Latest News Slider (using Slick Slider version 1.8.1) -->