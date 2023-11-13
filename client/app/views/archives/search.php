<?php 
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/breadcrumb.php';
?>

<section class="echo-hero-section inner inner-2">
    <div class="echo-hero">
        <div class="container">
            <div class="echo-full-hero-content">
                <div class="row gx-5 sticky-coloum-wrap">
                    <div class="col-xl-8 col-lg-8">
                        <?php if($data['posts']){
                            foreach($data['posts'] as $post){
                                echo '<div class="echo-hero-baner">
                                        <div class="echo-inner-img-ct-1  img-transition-scale">
                                            <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'"><img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'"></a>
                                        </div>
                                        <div class="echo-banner-texting">
                                            <h3 class="echo-hero-title text-capitalize font-weight-bold"><a href="'.URLROOT.'/posts/post/'.$post->postSlug.'" class="title-hover">'.$post->title.'</a></h3>
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
                                        <a href="<?=URLROOT?>/archives/search?s=<?=$data['keyword']?>&page=<?=$data['prevPage']?>" class="text-capitalize echo-py-btn">Previous Page</a>
                                    </div>
                                <?php endif; ?>
                                <?php if($data['currentPage'] * $data['perPagePosts'] < $data['totalPosts']) : ?>
                                    <div class="echo-de-category-show-more-btn text-center">
                                        <a href="<?=URLROOT?>/archives/search?s=<?=$data['keyword']?>&page=<?=$data['nextPage']?>" class="text-capitalize echo-py-btn">Next Page</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php }else{
                            echo 'No post found!';
                        } ?>
                    </div>
                    <?php require_once APPROOT.'/views/inc/side/side-section.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>