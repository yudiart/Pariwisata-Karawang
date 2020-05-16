      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.svg">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" action="<?= base_url('auth/registration');?>" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="First Name" name="firstname">
                    <?= form_error('firstname','<small class="text-danger">','</small');?>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Last Name" name="lastname">
                    <?= form_error('lastname','<small class="text-danger">','</small');?>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                    <?= form_error('email','<small class="text-danger">','</small');?>
                  </div>
                  <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01" name="role_id">
                      <option value="3">Karyawan</option>
                      <option value="4">Pemilik Vila</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password1">
                    <?= form_error('password1','<small class="text-danger">','</small');?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password2">
                    <?= form_error('password2','<small class="text-danger">','</small');?>
                  </div>
                  <!-- <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div> -->
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Registrasi</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= base_url('auth');?>" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->	