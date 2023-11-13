<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All the website pages</h3>
              </div>
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>User</th>
                    <th>Meta</th>
                    <th>Slug</th>
                    <th style="width:90px">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $index = 1;
                    foreach($data['pages'] as $page) : ?>
                    <tr>
                      <td><strong><?=$index?></strong></td>
                      <td><?=limitString($page->title)?></td>
                      <td><?=limitString(strip_tags($page->body))?></td>
                      <td><?=$page->username?></td>
                      <td><?=limitString($page->meta)?></td>
                      <td><?=$page->slug?></td>
                      <td>
                        <a href="<?=SITEURL?>/pages/page/<?=$page->slug?>" target="_blank" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                        <a href="<?=URLROOT?>/pages/edit/<?=$page->pageId?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="<?=URLROOT?>/pages/delete/<?=$page->pageId?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
      </div>
    </section>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>