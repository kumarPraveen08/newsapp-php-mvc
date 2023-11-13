<!-- Start Banner Area -->
<section class="echo-banner">
        <div class="echo-banner-content">
            <div class="container">
                <div class="echo-banner-full-content">
                    <div class="row gx-5 justify-content-md-center">
                        <div class="col-xl-9 col-lg-8 col-md-12">
                            <div class="swiper rts-bannerSlider">
                                <div class="swiper-wrapper">
                                    <?php if($data['recentPosts']){
                                        foreach($data['recentPosts'] as $post){
                                            echo '<div class="swiper-slide">
                                                    <div class="echo-banner-mani-content">
                                                        <div class="echo-banner-img">
                                                            <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'">
                                                        </div>
                                                        <div class="echo-banner-text">
                                                            <div class="echo-home-2-banner-col-act-text">
                                                                <div class="echo-banner-shep">
                                                                    <div class="home-2-area-shep">
                                                                        <p class="text-capitalize"><span>'.$post->name.'</span></p>
                                                                    </div>
                                                                </div>
                                                                <div class="echo-3-align-icons">
                                                                    <a href="'.URLROOT.'/archives/author/'.$post->postSlug.'"><i class="fa-regular fa-user"></i> '.$post->username.'</a>
                                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                                    <a href="#"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                                                </div>
                                                                <div class="echo-banner-heading">
                                                                    <h1 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h1>
                                                                </div>
                                                            </div>
                                                            <div class="echo-banner-slider-button">
                                                                <div class="swiper-button-next"></div>
                                                                <div class="swiper-button-prev"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    }else{
                                        echo 'No Post Found!';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-8">
                            <div class="echo-home-2-banner-right-flexing">
                                <?php if($data['newFeaturedPosts']){
                                    foreach($data['newFeaturedPosts'] as $post){
                                        echo '<div class="echo-banner-right-itme">
                                                <div class="echo-banar-right-img">
                                                    <div class="echo-banar-right-img-content img-transition-scale">
                                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'"></a>
                                                    </div>
                                                    <div class="echo-banner-shep">
                                                        <div class="home-2-area-shep">
                                                            <p class="text-capitalize"><span>'.$post->name.'</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="echo-banner-right-heading">
                                                    <h5 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h5>
                                                </div>
                                            </div>
                                            <hr>';
                                    }
                                }else{
                                    echo 'No Post Found!';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->