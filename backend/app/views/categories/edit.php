<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit New Category</h3>
                    </div>
                    <form action="<?=URLROOT?>/categories/edit/<?=$data['category']->id?>" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?=$data['category']->name?>" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="cate_img">Banner</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="cate_img" type="file" value="<?=$data['category']->cate_img?>" class="custom-file-input" id="cate_img">
                                        <label class="custom-file-label" for="cate_img"><?=$data['category']->cate_img?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Body</label>
                                <textarea name="body" id="name" cols="30" rows="5" class="form-control"><?=$data['category']->about_cate?></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>