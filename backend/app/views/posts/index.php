<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Posts</h3>
              </div>
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sn.</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User</th>
                    <th>Categories</th>
                    <th>Meta</th>
                    <th>views</th>
                    <th>Type</th>
                    <th>YT ID</th>
                    <th>Slug</th>
                    <th>Featured</th>
                    <th style="width:90px">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $index = 1;
                    foreach($data['posts'] as $post) : ?>
                    <tr>
                      <td><strong><?=$index?></strong></td>
                      <td><?=limitString($post->title)?></td>
                      <td><?=limitString(strip_tags($post->body))?></td>
                      <td><?=$post->username?></td>
                      <td><?=$post->name?></td>
                      <td><?=limitString($post->meta)?></td>
                      <td><?=$post->views?></td>
                      <td><?= $post->is_video ? 'Video' : 'Article' ?></td>
                      <td><?= $post->yt_url_id ? $post->yt_url_id : 'null' ?></td>
                      <td><?=$post->slug?></td>
                      <td><?= $post->featured ? 'yes' : 'no' ?></td>
                      <td>
                        <a href="<?=SITEURL?>/posts/post/<?=$post->postSlug?>" target="_blank" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                        <a href="<?=URLROOT?>/posts/edit/<?=$post->postId?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="<?=URLROOT?>/posts/delete/<?=$post->postId?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                    $index++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>