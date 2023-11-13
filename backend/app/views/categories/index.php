<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Categories</h3>
                </div>
                <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sn.</th>
                                <th>Name</th>
                                <th>Body</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th style="width:90px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1;
                            foreach($data['categories'] as $category) : ?>
                            <tr>
                                <td><strong><?=$index?></strong></td>
                                <td><?=$category->name?></td>
                                <td><?=limitString($category->about_cate)?></td>
                                <td><?=$category->slug?></td>
                                <td><?=$category->created_at?></td>
                                <td>
                                    <a href="<?=SITEURL?>/archives/category/<?=$category->slug?>" target="_blank" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                                    <a href="<?=URLROOT?>/categories/edit/<?=$category->id?>" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="<?=URLROOT?>/categories/delete/<?=$category->id?>" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $index++;
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Body</th>
                                <th>Slug</th>
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