     <?php echo form_open_multipart('user/lengkapiProfile'); ?>   
      <!--  -->
      <div class="card col-md-8  mr-1 ml-1 mb-3">
        <div class="input-group mt-4">
          <div class="title">
            <h1><?= $title;?></h1>
          </div>
        </div>
       
        <!-- dropdown-divider -->
        <div class="dropdown-divider mt-2 mb-3" style='border:1px solid'>
        </div>
        
        <div class="input-group mb-3">
          <div class="input-group-prepend mr-3">
               <img src="<?= base_url('assets/image/users/'.$user['image']);?>" style="width:100px;">
            </div>
          
        </div>
        <div class="input-group mb-3">
        <div class="custom-file col-md-6 col-lg-4">           
            <input type="file" class="custom-file-input" name="image_profile">
            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
          </div>
        </div>
        
        
       <div class="form-group">
          <input type="text" class="form-control" value="<?= $user['id'];?>"  name="userid" hidden>
        </div>
        
        <div class="form-group ">
          <label for="exampleInputPassword1">Jenis Kelamin</label>
          <select class="custom-select" id="inputGroupSelect01" name="jk">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <input type="text" class="form-control" placeholder="Alamat..." name="alamat">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="0812 xxxx xxxx"  name="no_hp">
        </div>
        
        <div class="input-group">
          <button type="submit" class="btn btn-primary mb-3 col-md-6 col-lg-4">Update</button>
        </div>
        
      </div>

        <!-- </div> -->
    <?php echo form_close();?>