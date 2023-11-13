<?php require_once APPROOT.'/views/inc/header.php' ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit New User</h3>
                    </div>
                    <form action="<?=URLROOT?>/users/edit/<?=$data['editUser']->id?>" enctype="multipart/form-data" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?=$data['editUser']->username?>" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="profile_img">Profile</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="profile_img" type="file" class="custom-file-input" value="profile.png" id="profile_img">
                                        <label class="custom-file-label" for="profile_img"><?=$data['editUser']->profile_img?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?=$data['editUser']->email?>" placeholder="Enter Email" required disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" class="form-control" id="phone" value="<?=$data['editUser']->phone?>" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="user" <?= $data['editUser']->role === 'user' ? 'selected' : '' ?>>User</option>
                                            <option value="author" <?= $data['editUser']->role === 'author' ? 'selected' : '' ?>>Author</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" value="<?=$data['editUser']->address?>" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label for="skills">Skills</label>
                                <input type="text" name="skills" class="form-control" id="skills" value="<?=$data['editUser']->skills?>" placeholder="Enter Skills eg: developer, writer">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="education">Education</label>
                                        <textarea name="education" id="education" cols="30" rows="4" class="form-control" placeholder="Enter your education details"><?=$data['editUser']->education?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea name="bio" id="bio" cols="30" rows="4" class="form-control" placeholder="Tell about yourself"><?=$data['editUser']->bio?></textarea>
                                    </div>
                                </div>
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