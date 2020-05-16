	<div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= base_url('vendor/purple/assets/images/logo.svg');?>">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <?= $this->session->flashdata('message');?>
                <form class="pt-3" action="<?= base_url('auth');?>" method="post">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                    <?= form_error('email','<small class="text-danger">','</small');?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                    <?= form_error('password','<small class="text-danger">','</small');?>
                  </div>
                  <!-- <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div> -->
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >Login</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?= base_url('auth/registration');?>" class="text-primary">Register</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->	