<!-- Start Featuer Area -->
<section class="echo-home-2-feature-area">
        <div class="echo-home-2-feature-area-content">
            <div class="container">
                <div class="echo-home-2-feature-area-full-content">
                    <div class="echo-home-2-title">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="echo-home-2-main-title">
                                    <h4 class="text-capitalize">Featured Post</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="echo-feature-content">
                        <div class="row gx-5">
                            <?php if($data['featuredPosts']){
                                foreach($data['featuredPosts'] as $post){
                                    echo '<div class="col-lg-4 col-md-6">
                                            <div class="echo-feature-main-content">
                                                <div class="echo-feature-area-img">
                                                    <div class="echo-feature-area-home-2-post img-transition-scale">
                                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="Echo"></a>
                                                    </div>
                                                    <div class="echo-feature-area-shep">
                                                        <div class="home-2-area-shep secondary">
                                                            <p class="text-capitalize"><span>'.$post->name.'</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="echo-feature-area-post-title">
                                                    <h4 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h4>
                                                    <p>'.$post->meta.'</p>
                                                </div>
                                                <div class="home-2-read-more-btn">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="text-uppercase">Read More</a>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }else{
                                echo '<div>No featured posts found!</div>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Aera -->