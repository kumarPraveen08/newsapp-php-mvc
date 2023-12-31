    <!-- Start Footer Area -->
    <!-- Start Footer Area -->
    <footer class="echo-footer-area footer-2" id="footer">
        <div class="container">
            <div class="echo-row">
                <div class="echo-footer-content-1">
                    <div class="echo-get-in-tuch">
                        <h4 class="text-capitalize">Get In Touch</h4>
                    </div>
                    <div class="echo-footer-address">
                        <span class="text-capitalize"><i class="fa-regular fa-map"></i> <?=CONTACT_ADDRESS?></span>
                        <span class="text-capitalize"><i class="fa-regular fa-phone"></i> <?=CONTACT_PHONE?></span>
                        <span class="text-capitalize"><i class="fa-sharp fa-regular fa-envelope"></i>
                        <?=CONTACT_EMAIL?></span>
                        <div class="echo-footer-social-media">
                            <a href="<?=SOCIAL_FB?>">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="<?=SOCIAL_X?>">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <a href="<?=SOCIAL_LN?>">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <a href="<?=SOCIAL_INSTA?>">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="<?=SOCIAL_YT?>">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="echo-footer-content-2">
                    <div class="echo-get-in-tuch">
                        <h4 class="text-capitalize">Most Popular</h4>
                    </div>
                    <div class="echo-footer-most-popular">
                        <ul class="list-unstyled">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Word</a></li>
                            <li><a href="#">Politics</a></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Video</a></li>
                            <li><a href="#">Life Style</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Travels</a></li>
                            <li><a href="#">Sports</a></li>
                            <li><a href="#">Game</a></li>
                        </ul>
                    </div>
                </div>
                <div class="echo-footer-content-3">
                    <div class="echo-get-in-tuch">
                        <h4 class="text-capitalize">Help</h4>
                    </div>
                    <div class="echo-footer-help">
                        <ul class="list-unstyled">
                            <li><a href="<?=URLROOT?>/pages/about">About</a></li>
                            <li><a href="<?=URLROOT?>/pages/privacy">Privacy Policy</a></li>
                            <li><a href="<?=URLROOT?>/pages/about">Media Kit</a></li>
                            <li><a href="<?=URLROOT?>/pages/contact">FAQ</a></li>
                            <li><a href="<?=URLROOT?>/rss">RSS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="echo-footer-content-4">
                    <div class="echo-get-in-tuch">
                        <h4 class="text-capitalize">Newsletter</h4>
                    </div>
                    <div class="echo-footer-news-text">
                        <p>Register now to get latest updates on promotion & coupons.</p>
                    </div>
                    <div class="echo-subscribe-box-button">
                        <form action="<?=URLROOT?>/subscribe" method="post">
                            <div class="echo-subscribe-input-fill">
                                <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.8" d="M14.4414 11.6674C14.4402 11.8345 14.3734 11.9944 14.2553 12.1127C14.1371 12.2309 13.9773 12.2979 13.8101 12.2993H2.34541C2.17792 12.2991 2.01736 12.2325 1.89899 12.114C1.78062 11.9955 1.71413 11.8348 1.71413 11.6674V11.0265H13.1687V3.58109L8.07777 8.16291L1.71413 2.43564V1.48109C1.71413 1.31232 1.78118 1.15045 1.90052 1.03111C2.01986 0.911772 2.18172 0.844727 2.3505 0.844727H13.805C13.9738 0.844727 14.1357 0.911772 14.255 1.03111C14.3744 1.15045 14.4414 1.31232 14.4414 1.48109V11.6674ZM3.26304 2.11745L8.07777 6.45109L12.8925 2.11745H3.26304ZM0.441406 8.48109H5.53232V9.75382H0.441406V8.48109ZM0.441406 5.29927H3.62322V6.572H0.441406V5.29927Z" fill="white" />
                                </svg>
                                <input type="email" name="newsletter" placeholder="Enter your email" required>
                            </div>
                            <div class="echo-footer-area-subscribe-button">
                                <button type="submit" class="btn btn-block btn-primary text-lg text-capitalize">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="echo-footer-copyright-area">
                <div class="copyright-area-inner">
                    <div class="footer-logo"><a href="<?=URLROOT?>"><img src="<?=URLROOT?>/img/site-logo/footer-logo-2.svg" alt="logo"></a></div>
                    <div class="copyright-content">
                        <h5 class="title">© Copyright <?=date("Y")?> by <?=SITENAME?></h5>
                    </div>
                    <div class="select-area">
                        <div id="lang"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!--scroll top button-->
    <button class="scroll-top-btn">
        <i class="fa-regular fa-angles-up"></i>
    </button>
    <!--scroll top button end-->

    <?php require_once APPROOT.'/views/inc/scripts.php' ?>

</body>

</html>