<?php require_once APPROOT.'/views/inc/header.php' ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach($data['dashboard'] as $result) : ?>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-<?=$result->bg?>">
                            <div class="inner">
                                <h3><?=$result->count?></h3>
                                <p><?=$result->name?></p>
                            </div>
                            <div class="icon"><i class="ion ion-bag"></i></div>
                            <a href="<?=URLROOT.$result->path?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>

  