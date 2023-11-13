<!-- Start Video Area-->
<section class="echo-video-area">
        <div class="echo-video-content">
            <div class="container">
                <div class="echo-video-area-title-row text-center">
                    <h6>Videos</h6>
                </div>
                <div class="echo-full-video-content">
                    <div class="row gx-6">
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="echo-video-left-site">
                                <?php if($data['featuredVideoPost']): ?>
                                    <a href="<?=URLROOT?>/posts/post/<?=$data['featuredVideoPost']->postId?>"><img src="<?=IMAGEROOT?>/img/posts/<?=$data['featuredVideoPost']->thumbnail?>" alt="<?=$data['featuredVideoPost']->title?>"></a>
                                    <div class="vedio-icone">
                                        <a class="play-video popup-youtube video-play-button" href="https://www.youtube.com/watch?v=<?=$data['featuredVideoPost']->yt_url_id?>">
                                            <span></span>
                                        </a>
                                        <div class="video-overlay">
                                            <a class="video-overlay-close">×</a>
                                        </div>
                                    </div>
                                    <div class="echo-video-left-site-text-box">
                                        <h5><a href="<?=URLROOT?>/posts/post/<?=$data['featuredVideoPost']->postSlug?>" class="title-hover"><?=$data['featuredVideoPost']->title?></a></h5>
                                        <hr>
                                        <div class="echo-video-left-site-read-views">
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i>  read</a>
                                            <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> <?=$data['featuredVideoPost']->views?> Views</a>
                                        </div>
                                    </div>
                                <?php else: echo 'No featured video post found!';
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="echo-video-area-home-1-right-content-responsive">
                                <?php if($data['recentVideoPosts']){
                                    foreach($data['recentVideoPosts'] as $videoPost){
                                        echo '<div class="echo-video-right-site-content">
                                                <div class="echo-video-right-site-content-text">
                                                    <h5 class="text-capitalize"><a href="'.URLROOT.'/posts/post/'.$videoPost->postSlug.'" class="title-hover text-white">'.$videoPost->title.'</a>
                                                    </h5>
                                                    <hr>
                                                    <a href="#" class="pe-none text-white"><i class="fa-light fa-clock"></i> '.readingTime(strlen($videoPost->body)).'
                                                        read</a>
                                                </div>
                                                <div class="echo-video-right-site-content-video">
                                                    <a href="'.URLROOT.'/posts/post/'.$videoPost->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$videoPost->thumbnail.'" alt="'.$videoPost->title.'"></a>
                                                    <div class="vedio-icone">
                                                        <a class="play-video popup-youtube video-play-button" href="https://www.youtube.com/watch?v='.$videoPost->yt_url_id.'">
                                                            <span></span>
                                                        </a>
                                                        <div class="video-overlay">
                                                            <a class="video-overlay-close">×</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }else{
                                    echo '<div>No fashion posts found!</div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Video Area -->