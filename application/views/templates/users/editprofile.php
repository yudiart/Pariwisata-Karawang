      <?php echo form_open_multipart('user/editprofile'); ?>   
      <!--  -->
      <div class="card col-md-8 mb-3 ">
        <div class="input-group mt-4">
          <div class="title">
            <h1><?= $title;?></h1>
          </div>
        </div>
        <?= $this->session->flashdata('message');?>

        <!-- dropdown-divider -->
        <div class="dropdown-divider mt-2 mb-3" style='border:0.5px solid grey'>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend mr-3">
             <img src="<?= base_url('assets/image/users/'.$user['image']);?>" style="width:100px;">
          </div>
          
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="image_profile" class="file-upload-default">
          <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Choose Picture..">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">File</button>
              </span>
            </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['firstname'];?>" name="firstname" >
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['lastname'];?>" name="lastname">
        </div>
       
        <?php foreach($udtl as $ud): ?>
        <div class="form-group ">
          <label for="exampleInputPassword1">Jenis Kelamin</label>
          <select class="custom-select" id="inputGroupSelect01" name="jk">
             <option selected><?= $ud['jk'];?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <?= form_error('jk','<small class="text-danger">','</small');?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $ud['alamat'];?>" name="alamat">
          <?= form_error('alamat','<small class="text-danger">','</small');?>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">+62</span>
          </div>
          <input type="text" class="form-control"  aria-label="no_hp" value="<?= substr($ud['no_hp'],0);?>" name="no_hp">
          <?= form_error('No_hp','<small class="text-danger">','</small');?>
        </div>        
      <?php endforeach; ?>
        <div class="form-group">
          <?php foreach($role as $r): ?>
            <label for="exampleInputEmail1">Status</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $r['role'];?>" disabled>
          <?php endforeach;?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Bergabung dari</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= date('d F Y', $user['created_at']);?>" disabled>
        </div>

        <div class="input-group">
          <button type="submit" class="btn btn-primary mb-3 col-md-6 col-lg-4">Update</button>
        </div>
        
      </div>

        <!-- </div> -->
    <?php echo form_close();?>
 