      <form action="<?= base_url('user/changePassword');?>" method="post">
      <!--  -->
      <div class="card col-md-8 mb-3 ">
        <div class="input-group mt-4">
          <div class="title">
            <h1><?= $title;?></h1>
          </div>
        </div>
        <!-- dropdown-divider -->
        <div class="dropdown-divider mt-2 mb-3" style='border:0.5px solid grey'>
        </div>
        
        <div class="form-group mt-4">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['email'];?>" disabled>
        </div>
         
        <div class="form-group">
          <label for="current_password">Current Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="current_password">
          <?= form_error('current_password','<small class="text-danger">','</small>');?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">New Password</label>
          <input type="password" class="form-control" id="new_password1" placeholder="Password" name="new_password1">
          <?= form_error('new_password1','<small class="text-danger">','</small>');?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Retype Password</label>
          <input type="password" class="form-control" id="new_password2" placeholder="Password" name="new_password2">
          <?= form_error('new_password2','<small class="text-danger">','</small>');?>
        </div>
        <div class="input-group">
          <button type="submit" class="btn btn-primary mb-3 col-md-6 col-lg-4">Update</button>
        </div>
      </div>
        <!-- </div> -->
 </form>