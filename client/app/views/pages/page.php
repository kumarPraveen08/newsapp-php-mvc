<?php 
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/breadcrumb.php';
?>

<!-- Start About area -->
<section class="echo-about-area">
    <div class="container">
        <div class="echo-about-area-inner">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="content-area">
                        <?=$data['page']->body?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About area -->

<?php require APPROOT . '/views/inc/footer.php'; ?>