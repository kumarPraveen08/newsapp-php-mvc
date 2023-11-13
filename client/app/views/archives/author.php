<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- start breadcrumb area -->
<!-- rts breadcrumba area start -->
<div class="echo-breadcrumb-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="echo-author-content">
                    <div class="echo-author-picture">
                        <img src="<?=URLROOT?>/img/users/<?=$data['author']->profile_img?>" alt="Echo">
                    </div>
                    <div class="echo-author-info">
                        <h5 class="text-capitalize"><?=$data['author']->username?></h5>
                        <p><?=$data['author']->bio?></p>
                        <div class="echo-footer-social-media">
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts breadcrumba area end -->
<!-- end breadcrumb area -->


<section class="echo-hero-section inner">
    <div class="echo-hero">
        <div class="container">
            <div class="echo-full-hero-content">
                <div class="row gx-5 sticky-coloum-wrap">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <?php foreach($data['posts'] as $post) {
                            echo '<div class="echo-hero-baner">
                                    <div class="echo-inner-img-ct-1  img-transition-scale">
                                        <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" class="echo-ct-style-1-banner-images" alt="Echo"></a>
                                    </div>
                                    <div class="echo-hero-baner-text-heading-info-ct-1">
                                        <h2 class="echo-hero-title text-capitalize font-weight-bold"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h2>
                                        <div class="echo-hero-area-titlepost-post-like-comment-share">
                                            <div class="echo-hero-area-like-read-comment-share">
                                                <a href="#"><i class="fa-light fa-clock"></i> '.readingTime(strlen($post->body)).' read</a>
                                            </div>
                                            <div class="echo-hero-area-like-read-comment-share">
                                                <a href="#"><i class="fa-light fa-eye"></i> '.$post->views.' Views</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="echo-hero-discription">'.$post->meta.'</p>
                                    </div>
                                </div>';
                        } ?>
                        <!-- Previous Page -->
                        <div class="pagination">
                            <?php if($data['currentPage'] > 1) : ?>
                                <div class="echo-de-category-show-more-btn text-center">
                                    <a href="<?=URLROOT?>/archives/author/<?=$data['author']->id?>?page=<?=$data['prevPage']?>" class="text-capitalize echo-py-btn">Previous Page</a>
                                </div>
                            <?php endif; ?>
                            <?php if($data['currentPage'] * $data['perPagePosts'] < $data['totalPosts']) : ?>
                                <div class="echo-de-category-show-more-btn text-center">
                                    <a href="<?=URLROOT?>/archives/author/<?=$data['author']->id?>?page=<?=$data['nextPage']?>" class="text-capitalize echo-py-btn">Next Page</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php require_once APPROOT.'/views/inc/side/side-section.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>