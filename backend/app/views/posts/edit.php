<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit New Post</h3>
                    </div>
                    <form action="<?=URLROOT?>/posts/edit/<?=$data['post']->id?>" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="<?=$data['post']->title?>" class="form-control" id="title" placeholder="Enter Title" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="editor" name="body"><?=$data['post']->body?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="thumbnail" value="<?=$data['post']->thumbnail?>" type="file" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail"><?=$data['post']->thumbnail?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cate_id">Category</label>
                                        <select name="cate_id" id="cate_id" class="form-control">
                                            <?php foreach($data['categories'] as $cate) : ?>
                                            <option value="<?=$cate->id?>" <?= $cate->id === $data['post']->category_id ? ' selected' : '' ?>><?=$cate->name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="type">Content Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="2"<?= $data['post']->is_video ? '' : ' selected' ?>>Article</option>
                                            <option value="1"<?= $data['post']->is_video ? ' selected' : '' ?>>Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ytid">YouTube Video Id</label>
                                        <input type="text" name="ytid" class="form-control" value="<?=$data['post']->yt_url_id?>" id="ytid" placeholder="Enter Id eg: hxthodj2hf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="featured">Featured</label>
                                        <select name="featured" id="featured" class="form-control">
                                            <option value="true"<?= $data['post']->featured ? ' selected' : '' ?>>Yes</option>
                                            <option value="false"<?= $data['post']->featured ? '' : ' selected' ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="meta">Meta Description</label>
                                <textarea name="meta" id="meta" cols="30" rows="3" class="form-control" placeholder="Enter Meta Description" required><?=$data['post']->meta?></textarea>
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