<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Comments</h3>
                </div>
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Post</th>
                                <th>Created At</th>
                                <th style="width:60px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1;
                            foreach($data['comments'] as $comment) : ?>
                            <tr>
                                <td><strong><?=$index?></strong></td>
                                <td><?=limitString($comment->comment)?></td>
                                <td><?=$comment->username?></td>
                                <td><?=limitString($comment->title)?></td>
                                <td><?=$comment->commentCreated?></td>
                                <td>
                                    <a href="<?=URLROOT?>/comments/edit/<?=$comment->commentId?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="<?=URLROOT?>/comments/delete/<?=$comment->commentId?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $index++;
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial</th>
                                <th>Comment</th>
                                <th>User</th>
                                <th>Post</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
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