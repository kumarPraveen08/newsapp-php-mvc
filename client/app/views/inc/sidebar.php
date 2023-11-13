<!-- side bar for desktop -->
<div id="side-bar" class="side-bar header-one">
    <div class="inner">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="inner-main-wrapper-desk d-none d-lg-block">
            <div class="thumbnail">
                <img src="<?=URLROOT?>/img/site-logo/sidemenu-logo.svg" alt="echo">
            </div>
            <div class="inner-content">
                <div class="category-menu-area">
                    <ul class="category-area">
                        <?php if($data['navTrendingPosts']) {
                            foreach($data['navTrendingPosts'] as $post){
                                echo '<li class="item">
                                        <div class="image-area">
                                            <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="recent-post-title">
                                                <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">'.$post->title.'</a>
                                            </div>
                                            <p class="desc"><a href="'.URLROOT.'/archives/author/'.$post->userId.'"><i class="fa-light fa-user"></i>'.$post->username.'</a></p>
                                        </div>
                                    </li>';
                            }
                        }else{
                            echo '<div class="swiper-slide">No trending posts found!</div>';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu area start -->
    <div class="mobile-menu d-block d-lg-none">
        <nav class="nav-main mainmenu-nav mt--30">
            <ul class="mainmenu" id="mobile-menu-active">
                <li class="has-droupdown">
                    <a href="<?=URLROOT?>" class="main">Home</a>
                </li>
                <li class="menu-item"><a class="main mobile-menu-link" href="<?=URLROOT?>/about">About</a></li>
                <li class="has-droupdown">
                    <a href="#" class="main">Category</a>
                    <ul class="submenu">
                        <?php foreach($data['menu'] as $item){
                            echo '<li><a class="mobile-menu-link" href="'.URLROOT.'/archives/category/'.$item->slug.'">'.$item->name.'</a></li>';
                        } ?>
                    </ul>
                </li>
                <li class="has-droupdown">
                    <a href="#" class="main">Post</a>
                    <ul class="submenu">
                        <?php 
                        if($data['recentPosts']){
                            foreach($data['recentPosts'] as $post){
                                echo '<li class="nav-item">
                                        <a class="mobile-menu-link" href="'.URLROOT.'/posts/post/'.$post->postSlug.'">'.limitString($post->title, 100).'</a>
                                    </li>';
                            }
                        }else{
                            echo '<li class="nav-item">No posts found!</li>';
                        } ?>
                    </ul>
                </li>
                <li class="menu-item"><a class="main mobile-menu-link" href="<?=URLROOT?>/contact">Contact</a></li>
            </ul>
        </nav>

        <div class="social-wrapper-one">
            <ul>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- mobile menu area end -->
</div>
<!-- header style two End -->

