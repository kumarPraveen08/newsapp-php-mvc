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
                    <div class="col-lg-8 col-md-12 mx-auto p-5">
                        <form action="<?=URLROOT?>/users/register" method="post" class="login-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" id="password" name="confirm_password" placeholder="Enter confirm password" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6"><input type="submit" class="btn btn-block btn-primary echo-py-btn-border text-capitalize" value="submit"></div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center"><span class="px-2">Already have an account?</span> <a href="<?= URLROOT.'/users/login' ?>">Login</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<?php require APPROOT . '/views/inc/footer.php'; ?>