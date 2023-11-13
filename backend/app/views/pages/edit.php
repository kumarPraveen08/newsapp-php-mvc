<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit New Page</h3>
                    </div>
                    <form action="<?=URLROOT?>/pages/edit/<?=$data['page']->id?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="<?=$data['page']->title?>" id="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="editor"><?=$data['page']->body?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta">Meta Description</label>
                                <input type="text" name="meta" class="form-control" id="meta" value="<?=$data['page']->meta?>" placeholder="Enter Meta Description" required>
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