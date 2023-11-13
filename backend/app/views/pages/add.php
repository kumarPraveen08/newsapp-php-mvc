<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Page</h3>
                    </div>
                    <form action="<?=URLROOT?>/pages/add" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="editor" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta">Meta Description</label>
                                <input type="text" name="meta" class="form-control" id="meta" placeholder="Enter Meta Description" required>
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