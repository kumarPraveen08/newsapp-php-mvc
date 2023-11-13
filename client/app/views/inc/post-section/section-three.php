<!-- Start Trending News Area -->
<section class="echo-trending-area">
        <div class="echo-trending-content">
            <div class="container">
                <h6>Trending</h6>
                <div class="echo-trending-full-content">
                    <div class="row gx-6">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <?php if($data['trendingPosts']){
                                foreach($data['trendingPosts']  as $post){
                                    echo '<div class="echo-trending-left-site-post">
                                            <div class="echo-trending-left-site-post-img img-transition-scale">
                                                <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                    <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="Echo" class="img-hover">
                                                </a>
                                            </div>
                                            <div class="echo-trending-right-site-post-title">
                                                <h5><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="text-capitalize title-hover">'.$post->title.'</a></h5>
                                                <div class="echo-trending-post-bottom-icons">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                </div>
                                            </div>
                                        </div>';
                                }
                            }else{
                                echo 'No trending posts found!';
                            } ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <?php if($data['featuredTrendingPosts']){
                                foreach($data['featuredTrendingPosts'] as $post){
                                    echo '<div class="echo-trending-right-site-post">
                                            <div class="echo-trending-right-site-post-img img-transition-scale">
                                                <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                    <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="Echo" class="img-hover">
                                                </a>
                                            </div>
                                            <div class="echo-trending-right-site-post-title">
                                                <h4 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h4>
                                            </div>
                                            <div class="echo-trending-right-site-like-comment-share-icons">
                                                <div class="echo-trending-right-like-comment-content">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                                </div>
                                                <div class="echo-trending-right-like-comment-content">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                                </div>
                                                <div class="echo-trending-right-like-comment-content">
                                                    <a href="'.URLROOT.'/archives/author/'.$post->postSlug.'"><i class="fa-regular fa-user"></i> '.$post->username.'</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="echo-hr-home-1-tranding">';
                                }
                            }else{
                                echo 'No trending posts found!';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending News Area -->