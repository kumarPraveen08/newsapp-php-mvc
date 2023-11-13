<?php 
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/breadcrumb.php';
?>

<!-- Start Contact Area -->
<section class="echo-contact-area">
    <div class="echo-contact-content">
        <div class="container">
            <div class="echo-contact-full-content">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="echo-contact-input-field">
                            <div class="echo-contact-title">
                                <h2 class="text-capitalize"><?=CONTACT_TITLE?></h2>
                            </div>
                            <div class="echo-contact-sub-title">
                                <p><?=CONTACT_DESCRIPTION?></p>
                            </div>
                            <div class="echo-main-contact-form">
                                <div id="form-messages" class="success"><?=$data['success']?></div>
                                <form action="" method="post">
                                    <div class="echo-contact-input-flexing">
                                        <div class="echo-contact-name echo-df-input">
                                            <input name="name" value="<?=$data['name']?>" type="text" placeholder="Name" required>
                                        </div>
                                        <div class="echo-contact-email echo-df-input">
                                            <input name="email" value="<?=$data['email']?>" type="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="echo-contact-input-flexing echo-df-input">
                                        <div class="echo-contact-number echo-df-input">
                                            <input name="phone" value="<?=$data['phone']?>" type="text" placeholder="Phone" required>
                                        </div>
                                        <div class="echo-contact-url echo-df-input">
                                            <input name="subject" value="<?=$data['subject']?>" type="text" placeholder="Subject" required>
                                        </div>
                                    </div>
                                    <div class="echo-contact-texting-fild">
                                        <textarea name="message" value="<?=$data['message']?>" placeholder="Write your message here..." required></textarea>
                                    </div>
                                    <button type="submit" class="echo-contact-btn">Submit<i class="fa-regular fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="echo-info">
                            <div class="echo-address">
                                <h6 class="text-capitalize">Location</h6>
                                <span><?=CONTACT_ADDRESS?></span>
                            </div>
                            <div class="echo-address">
                                <h6 class="text-capitalize">Email</h6>
                                <span><?=CONTACT_EMAIL?></span>
                            </div>
                            <div class="echo-address">
                                <h6 class="text-capitalize">Phone</h6>
                                <span><?=CONTACT_PHONE?></span>
                            </div>
                            <div class="echo-map">
                                <iframe class="contact-map" src="<?=CONTACT_MAP_EMBED_URI?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->

<?php require APPROOT . '/views/inc/footer.php'; ?>