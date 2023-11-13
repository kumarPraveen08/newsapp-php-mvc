<?php require_once APPROOT.'/views/inc/header.php' ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                src="<?=URLROOT?>/img/users/<?=$data['profile']->profile_img?>"
                                alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?=ucfirst($data['profile']->username)?></h3>
                            <p class="text-muted text-center"><?=$data['profile']->bio?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Posts</b> <a class="float-right"><?=$data['postRowCoint']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined</b> <a class="float-right"><?=$data['profile']->created_at?></a>
                                </li>
                            </ul>
                            <a href="<?=URLROOT?>/profile/deactivate/<?=$data['profile']->id?>" class="btn btn-danger btn-block"><b>Deactivate Account</b></a>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>
                            <p class="text-muted"><?=$data['profile']->education?></p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?=ucfirst($data['profile']->address)?></p>
                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                            <p class="text-muted"><?=ucwords($data['profile']->skills)?></p>
                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                            <p class="text-muted"><?=ucfirst($data['profile']->bio)?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" method="post" action="<?=URLROOT?>/profile/settings/<?=$data['profile']->id?>">
                                        <div class="form-group row">
                                            <label for="un" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" value="<?=$data['profile']->username?>" id="un" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ue" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                            <input type="email" class="form-control" value="<?=$data['profile']->email?>" id="ue" placeholder="Enter Email" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="up" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="phone" class="form-control" value="<?=$data['profile']->phone?>" id="up" placeholder="Enter Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ul" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="address" class="form-control" value="<?=$data['profile']->address?>" id="ul" placeholder="Enter Location">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="us" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                            <input type="text" name="skills" class="form-control" value="<?=$data['profile']->skills?>" id="us" placeholder="Enter Skills eg: photoshop, web design">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ued" class="col-sm-2 col-form-label">Education</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" name="education" id="ued" rows="3" placeholder="Enter Education"><?=$data['profile']->education?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ub" class="col-sm-2 col-form-label">Bio</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" name="bio" id="ub" rows="3" placeholder="Bio"><?=$data['profile']->bio?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="password">
                                    <form class="form-horizontal" method="post" action="<?=URLROOT?>/profile/resetpassword/<?=$data['profile']->id?>">
                                        <div class="form-group row">
                                            <label for="opsd" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-10">
                                            <input type="password" name="opsd" class="form-control" id="opsd" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="npsd" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                            <input type="password" name="npsd" class="form-control" id="npsd" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php' ?>

  