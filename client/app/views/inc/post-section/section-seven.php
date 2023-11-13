<!-- Start De-category Area -->
<section class="echo-de-category-area">
        <div class="echo-de-category-area-content">
            <div class="container">
                <div class="echo-de-category-full-content">
                    <div class="echo-de-category-title-btn">
                        <h4 class="text-capitalize">Discover Categories</h4>
                        <a href="<?=URLROOT?>/posts" class="text-capitalize echo-py-btn">View all posts</a>
                    </div>
                    <div class="row gx-5">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="echo-de-category-content echo-responsive-wd">
                                <h5 class="text-capitalize"><?=FIRST_COL?></h5>
                                <hr>
                                <?php if($data['fashionPosts']){
                                    foreach($data['fashionPosts'] as $post){
                                        echo '<div class="echo-de-category-content-img-title">
                                                <div class="echo-de-category-content-img img-transition-scale">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                        <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover">
                                                    </a>
                                                </div>
                                                <div class="echo-de-category-content-title">
                                                    <h6><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h6>
                                                    <div class="echo-de-category-read">
                                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' 
                                                            read</a>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }else{
                                    echo '<div>No fashion posts found!</div>';
                                } ?>
                                <div class="echo-de-category-show-more-btn">
                                    <a href="<?=URLROOT?>/archives/category/1" class="text-capitalize echo-py-btn">Show more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="echo-de-category-content">
                                <h5 class="text-capitalize"><?=SECOND_COL?></h5>
                                <hr>
                                <?php if($data['technologyPosts']){
                                    foreach($data['technologyPosts'] as $post){
                                        echo '<div class="echo-de-category-content-img-title">
                                                <div class="echo-de-category-content-img img-transition-scale">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                        <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover">
                                                    </a>
                                                </div>
                                                <div class="echo-de-category-content-title">
                                                    <h6><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h6>
                                                    <div class="echo-de-category-read">
                                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).'
                                                            read</a>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }else{
                                    echo '<div>No technology posts found!</div>';
                                } ?>
                                <div class="echo-de-category-show-more-btn">
                                    <a href="<?=URLROOT?>/archives/category/2" class="text-capitalize echo-py-btn">Show more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="echo-de-category-content">
                                <h5 class="text-capitalize"><?=THIRD_COL?></h5>
                                <hr>
                                <?php if($data['travelPosts']){
                                    foreach($data['travelPosts'] as $post){
                                        echo '<div class="echo-de-category-content-img-title">
                                                <div class="echo-de-category-content-img img-transition-scale">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                        <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover">
                                                    </a>
                                                </div>
                                                <div class="echo-de-category-content-title">
                                                    <h6><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h6>
                                                    <div class="echo-de-category-read">
                                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).'
                                                            read</a>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }else{
                                    echo '<div>No travel posts found!</div>';
                                } ?>
                                <div class="echo-de-category-show-more-btn">
                                    <a href="<?=URLROOT?>/archives/category/3" class="text-capitalize echo-py-btn">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>