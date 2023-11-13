<?php require_once APPROOT.'/views/auth/includes/header.php' ?>

<div class="login-box">
  <div class="login-logo">
    <a href="<?=SITEURL?>"><b><?=SITENAME?></b>APP</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form action="<?=URLROOT?>/auth/resetpassword" method="post">
        <div class="input-group mb-3">
          <input type="password" name="psd" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="repsd" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?=URLROOT?>/auth/login">Login</a>
      </p>
      <p class="mb-0">
        <a href="<?=URLROOT?>/auth/register" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>

<?php require_once APPROOT.'/views/auth/includes/footer.php' ?>