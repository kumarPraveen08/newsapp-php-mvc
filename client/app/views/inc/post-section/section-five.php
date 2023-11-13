<!-- Start Archive Area -->
<section class="echo-archive-area">
        <div class="echo-archive-area-content">
            <div class="container">
                <div class="echo-archive-area-full-content">
                    <div class="echo-home-2-title">
                        <div class="row text-left">
                            <div class="col-lg-12 col-md-12">
                                <div class="echo-home-2-main-title">
                                    <h4 class="text-capitalize">The Archive</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="echo-archive-area-slider-content">
                        <div class="row gx-5">
                            <div class="col-lg-7 col-md-12">
                                <div class="echo-archive-main-content area-2">
                                    <div class="swiper rts-bannerSlider">
                                        <div class="swiper-wrapper">
                                            <?php if($data['archivePosts']){
                                                foreach($data['archivePosts'] as $post){
                                                    echo '<div class="swiper-slide">
                                                            <div class="echo-banner-mani-content">
                                                                <div class="echo-banner-img">
                                                                    <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'">
                                                                </div>
                                                                <div class="echo-banner-text">
                                                                    <div class="echo-banner-shep">
                                                                        <div class="home-2-area-shep">
                                                                            <p class="text-capitalize"><span>'.$post->name.'</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="echo-3-align-icons">
                                                                        <a href="'.URLROOT.'/archives/author/'.$post->userId.'"><i class="fa-regular fa-user"></i> '.$post->username.'</a>
                                                                        <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                                        <a href="#" class="pe-none"><i class="fa-light fa-comment-dots"></i> 05 Comment</a>
                                                                    </div>
                                                                    <div class="echo-banner-heading">
                                                                        <h1 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h1>
                                                                    </div>
                                                                    <div class="echo-banner-slider-button">
                                                                        <div class="swiper-button-next"></div>
                                                                        <div class="swiper-button-prev"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                }
                                            }else {
                                                echo 'No post found!';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="echo-fd-psot-home-2-responsive-flexing">
                                    <?php if($data['archiveFeaturedPosts']){
                                        foreach($data['archiveFeaturedPosts'] as $post){
                                            echo '<div class="echo-archive-area-right-site">
                                                    <div class="echo-archive-right-content">
                                                        <div class="echo-archive-right-text">
                                                            <div class="echo-archive-right-area-shep">
                                                                <div class="home-2-area-shep secondary">
                                                                    <p class="text-capitalize"><span>'.$post->name.'</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="echo-3-align-icons">
                                                                <a href="#" class="pe-none"><i class="fa-regular fa-user"></i> '.$post->username.'</a>
                                                                <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                            </div>
                                                            <div class="echo-archive-right-heading">
                                                                <h5 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h5>
                                                            </div>
                                                        </div>
                                                        <div class="echo-archive-right-img img-transition-scale">
                                                            <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'"></a>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    }else {
                                        echo 'No post found!';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Archive Area -->