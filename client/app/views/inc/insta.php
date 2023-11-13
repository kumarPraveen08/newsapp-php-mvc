<!-- Start Social Media Hm2 -->
<section class="echo-social-media-area-hm2">
        <div class="container">
            <div class="echo-home-2-title">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="echo-home-2-main-title">
                            <h4 class="text-capitalize">Follow Instagram</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="echo-social-media-area-content">
            <div class="echo-social-media-main-content">
            <?php for($i = 1; $i <= 5; $i++){
                echo '<div class="echo-hm2-social-item">
                        <img src="'.URLROOT.'/img/insta/'.$i.'.png" alt="insta-'.$i.'">
                        <a href="'.URLROOT.'/img/insta/'.$i.'.png" class="echo-hm2-img-popup">
                            <div class="echo-hm2-social-item-overlay">
                                <span><i class="fa-brands fa-instagram"></i></span>
                            </div>
                        </a>
                    </div>';
            } ?>
            </div>
        </div>
    </section>
    <!-- End Social Media Hm2 -->