<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                    </div>
                    <form action="<?=URLROOT?>/categories/add" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="cate_img">Banner</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="cate_img" type="file" class="custom-file-input" id="cate_img">
                                        <label class="custom-file-label" for="cate_img">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Body</label>
                                <textarea name="body" id="name" cols="30" rows="5" class="form-control"></textarea>
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