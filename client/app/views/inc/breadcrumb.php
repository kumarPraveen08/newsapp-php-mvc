<!-- rts breadcrumb area start -->
<div class="echo-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <div class="meta">
                            <a href="<?=URLROOT?>" class="prev">HOME /</a>
                            <a href="#" class="next"><?=$data['title']?></a>
                        </div>
                        <!-- check if the page is archives -->
                        <h1 class="title"><?=archivePrefix()?><?=$data['title']?></h1>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->