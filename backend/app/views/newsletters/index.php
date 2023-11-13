<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Newsletters</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th style="width:60px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach($data['newsletters'] as $newsletter) : ?>
                                    <tr>
                                        <td><strong><?=$index?></strong></td>
                                        <td><?=$newsletter->email?></td>
                                        <td><?=$newsletter->created_at?></td>
                                        <td>
                                            <a href="<?=URLROOT?>/newsletters/edit/<?=$newsletter->id?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                            <a href="<?=URLROOT?>/newsletters/delete/<?=$newsletter->id?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $index++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>