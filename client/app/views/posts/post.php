<?php 
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/breadcrumb.php';
?>

<section class="echo-hero-section inner inner-post">
    <div class="echo-hero">
        <div class="container">
            <div class="echo-full-hero-content">
                <div class="row gx-5 sticky-coloum-wrap">
                    <div class="col-xl-8 col-lg-8">
                        <div class="echo-hero-baner">

                            <?php if($data['post']->is_video) {
                                // video article image area
                                echo '<div class="youtube" videoSource="'.$data['post']->yt_url_id.'" src="'.IMAGEROOT.'/img/posts/'.$data['post']->thumbnail.'" style="width:100%; height:0; padding-top:56%"></div>';
                            }else{
                                // default article image area
                                echo '<div class="echo-inner-img-ct-1  img-transition-scale">
                                        <img src="'.IMAGEROOT.'/img/posts/'.$data['post']->thumbnail.'" alt="'.$data['post']->title.'" class="post-style-1-frist-hero-img">
                                    </div>';
                            } ?>

                            <h2 class="echo-hero-title text-capitalize font-weight-bold"><?=$data['post']->title?></h2>
                            <div class="echo-hero-area-titlepost-post-like-comment-share">
                                <div class="echo-hero-area-like-read-comment-share">
                                    <a href="#"><i class="fa-light fa-clock"></i> <?=$data['reading']?> read</a>
                                </div>
                                <div class="echo-hero-area-like-read-comment-share">
                                    <a href="#"><i class="fa-light fa-eye"></i> <?=$data['post']->views?> Views</a>
                                </div>
                                <div class="echo-hero-area-like-read-comment-share">
                                    <a href="#comments"><i class="fa-light fa-comment-dots"></i> <?=$data['commentsCount']?> Comment</a>
                                </div>
                                <div class="echo-hero-area-like-read-comment-share">
                                    <a href="<?=URLROOT?>/archives/category/<?=$data['category']->slug?>"><i class="fa-light fa-file"></i> <?=$data['category']->name?></a>
                                </div>
                                <div class="echo-hero-area-like-read-comment-share">
                                    <a href="<?=URLROOT?>/archives/author/<?=$data['author']->id?>"><i class="fa-light fa-user"></i> <?=$data['author']->username?></a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5"><?=$data['post']->body?></div>
                        <div class="echo-author-area">
                            <div class="image-area">
                                <img src="<?=IMAGEROOT?>/img/users/<?=$data['author']->profile_img?>" alt="author">
                            </div>
                            <div class="content">
                            <a href="<?=URLROOT?>/archives/author/<?=$data['author']->id?>"><h5 class="title"><?=$data['author']->username?></h5></a>
                                <p class="desc"><?=$data['author']->bio?></p>
                            </div>
                        </div>
                        <div class="echo-more-news-area">
                            <h3 class="title">You Might Also Like</h3>
                            <div class="inner">
                                <div class="row">
                                    <?php if($data['relatedPosts']){
                                        foreach($data['relatedPosts'] as $post){
                                            echo '<div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="echo-top-story">
                                                        <div class="echo-story-picture img-transition-scale">
                                                            <a href="post-details.html"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hover"></a>
                                                        </div>
                                                        <div class="echo-story-text">
                                                            <h6><a href="'.URLROOT.'/posts/post/'.$post->slug.'" class="title-hover">'.$post->title.'</a></h6>
                                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                                        </div>
                                                    </div>
                                                </div>';
                                        }
                                    }else{
                                        echo 'No related post found!';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="echo-reply-area" id="comments">
                            <h5 class="title">Comment</h5>
                            <ul class="comment-inner">
                            <?php if($data['comments']){
                                foreach($data['comments'] as $comment){
                                    echo '<li class="wrapper">
                                            <div class="image-area">
                                                <img src="'.IMAGEROOT.'/img/users/'.$comment->profile_img.'" alt="'.$comment->username.'">
                                            </div>
                                            <div class="content">
                                                <h5 class="title">'.$comment->username.'</h5>
                                                <a href="#" class="pe-none">'.$comment->commentCreated.'</a>
                                                <p class="desc">'.$comment->comment.'</p>
                                            </div>
                                            <div class="reply"><i class="fa-regular fa-share"></i> Reply</div>
                                        </li>';
                                }
                            } ?>
                            </ul>
                        </div>
                        <div class="echo-comment-box">
                            <div class="comment-box-inner">
                                <h5 class="title">Leave A Comment</h5>
                                <?php if(isset($_SESSION['user_id'])){
                                    echo '<form action="'.URLROOT.'/posts/post/'.$data['post']->slug.'" method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <textarea name="message" placeholder="Write Your Comment Here"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="submit-btn">Submit Now</button>
                                                </div>
                                            </div>
                                        </form>';
                                }else{
                                    echo '<div>Please <a href="'.URLROOT.'/users/login">Login</a> to comment</div>';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php require_once APPROOT.'/views/inc/side/side-section.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>