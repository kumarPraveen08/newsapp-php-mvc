<!-- Start Home-1 Menu & Site Logo & Social Media -->
<div class="echo-home-1-menu">
  <div class="echo-site-main-logo-menu-social">
      <div class="container">
          <div class="row align-items-center plr_md--30 plr_sm--30 plr--10">
              <div class="col-xl-2 col-lg-2 col-md-7 col-sm-7 col-7">
                  <div class="echo-site-logo">
                      <a class="logo-light" href="<?=URLROOT?>"><img src="<?=URLROOT?>/img/site-logo/site-logo.svg" alt="Echo"></a>
                      <a class="logo-dark" href="<?=URLROOT?>"><img src="<?=URLROOT?>/img/site-logo/site-logo-dark.svg" alt="Echo"></a>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                  <nav>
                      <div class="echo-home-1-menu">
                          <ul class="list-unstyled echo-desktop-menu">
                              <li class="menu-item">
                                  <a href="<?=URLROOT?>" class="echo-dropdown-main-element active">Home</a>
                              </li>
                              <li class="menu-item">
                                  <a href="<?=URLROOT.'/posts'?>" class="echo-dropdown-main-element">Posts</a>
                              </li>
                              
                              <li class="menu-item echo-has-dropdown">
                                  <a href="#" class="echo-dropdown-main-element">News</a>
                                  <ul class="mega-menu list-unstyled menu-pages">
                                    <?php 
                                    if($data['recentPosts']){
                                        foreach($data['recentPosts'] as $post){
                                            echo '<li class="nav-item">
                                                    <a href="'.URLROOT.'/posts/post/'.$post->postSlug.'">
                                                        <div class="mega-menu-item">
                                                            <div class="mega-menu-img img-transition-scales">
                                                                <img src="'.IMAGEROOT.'/img/posts/'.$post->thumbnail.'" alt="'.$post->title.'" class="img-hovers">
                                                            </div>
                                                            <div class="mega-menu-title">
                                                                <h5>'.$post->title.'</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>';
                                        }
                                    }else{
                                        echo '<li class="nav-item">No posts found!</li>';
                                    } ?>
                                  </ul>
                              </li>
                              <li class="menu-item echo-has-dropdown">
                                  <a href="#" class="echo-dropdown-main-element">Category</a>
                                  <ul class="echo-submenu list-unstyled menu-pages">
                                        <?php foreach($data['menu'] as $item){
                                            echo '<li class="nav-item"><a href="'.URLROOT.'/archives/category/'.$item->slug.'">'.$item->name.'</a></li>';
                                        } ?>
                                  </ul>
                              </li>
                              <li class="menu-item echo-has-dropdown">
                                  <a href="<?=URLROOT?>/pages" class="echo-dropdown-main-element">Pages</a>
                                  <ul class="echo-submenu list-unstyled menu-pages">
                                      <li class="nav-item"><a href="<?=URLROOT.'/pages/about'?>">About</a></li>
                                  </ul>
                              </li>
                              <li class="menu-item"><a href="<?=URLROOT.'/pages/contact'?>" class="echo-dropdown-main-element">Contact</a></li>
                          </ul>
                      </div>
                  </nav>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-5 col-sm-5 col-5">
                  <div class="echo-home-1-social-media-icons">
                      <ul class="list-unstyled social-area">
                          <li><a href="<?=SOCIAL_FB?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                          <li><a href="<?=SOCIAL_X?>"><i class="fa-brands fa-twitter"></i></a></li>
                          <li><a href="<?=SOCIAL_LN?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                          <li><a href="<?=SOCIAL_INSTA?>"><i class="fa-brands fa-instagram"></i></a></li>
                          <li><a href="<?=SOCIAL_YT?>"><i class="fa-brands fa-pinterest-p"></i></a></li>
                          <li><a href="<?=SOCIAL_PT?>"><i class="fa-brands fa-youtube"></i></a></li>
                          <?php if(isset($_SESSION['user_id'])){
                                echo '<li><a href="'.URLROOT.'/users/logout" class="ml-2 pr-2 bg-danger py-2 px-3 rounded">Sign Out</a></li>';
                            } ?>
                      </ul>
                      <div class="echo-header-top-menu-bar menu-btn">
                          <a href="javascript:void(0)">
                              <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M0.526001 0.953461H20V3.11724H0.526001V0.953461ZM7.01733 8.52668H20V10.6905H7.01733V8.52668ZM0.526001 16.0999H20V18.2637H0.526001V16.0999Z" fill="#5E5E5E" />
                              </svg>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Home-1 Menu & Site Logo & Social Media -->