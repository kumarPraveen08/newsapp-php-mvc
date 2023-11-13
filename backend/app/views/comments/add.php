<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Comment</h3>
                    </div>
                    <form action="<?=URLROOT?>/comments/add" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user">User</label>
                                        <select name="user_id" class="select2 form-control" style="width: 100%;" required>
                                            <?php foreach($data['users'] as $item) : ?>
                                            <option value="<?=$item->id?>"><?=$item->username?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="post">Post</label>
                                        <select name="post_id" class="select2 form-control" style="width: 100%;" required>
                                            <?php foreach($data['posts'] as $item) : ?>
                                                <option value="<?=$item->postId?>"><?=$item->title?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Comment</label>
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Write you comment" required></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="time">Created At</label>
                                <input type="datetime-local" class="form-control" id="time">
                            </div> -->
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