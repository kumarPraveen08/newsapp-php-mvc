<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
                    </div>
                    <form action="<?=URLROOT?>/posts/add" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="editor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="thumbnail" type="file" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cate">Category</label>
                                        <select name="cate_id" id="cate" class="form-control" required>
                                            <?php foreach($data['categories'] as $cate) : ?>
                                            <option value="<?=$cate->id?>"><?=$cate->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="type">Content Type</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="0">Article</option>
                                            <option value="1">Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ytid">YouTube Video Id</label>
                                        <input type="text" name="ytid" class="form-control" id="ytid" placeholder="Enter Id eg: hxthodj2hf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="featured">Featured</label>
                                        <select name="featured" id="featured" class="form-control" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="meta">Meta Description</label>
                                <textarea name="meta" id="meta" cols="30" rows="3" class="form-control" placeholder="Enter Meta Description" required></textarea>
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