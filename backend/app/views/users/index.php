<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>
              </div>
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Username</th>
                    <th>Bio</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th style="width:120px">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $index = 1;
                    foreach($data['users'] as $user) : ?>
                    <tr>
                      <td><strong><?=$index?></strong></strong></td>
                      <td><?=$user->username?></td>
                      <td><?=limitString($user->bio)?></td>
                      <td><?=$user->email?></td>
                      <td><?=$user->phone?></td>
                      <td><?=$user->role?></td>
                      <td><?=$user->created_at?></td>
                      <td>
                        <?php
                        if($user->role === 'author') : ?>
                        <a href="<?=SITEURL?>/archives/author/<?=$user->id?>" target="_blank" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                        <?php endif;?>
                        <a href="<?=URLROOT?>/users/edit/<?=$user->id?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                        <a href="<?=URLROOT?>/users/delete/<?=$user->id?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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