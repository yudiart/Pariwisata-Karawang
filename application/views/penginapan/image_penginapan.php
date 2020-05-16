<?php echo form_open_multipart('Penginapan/lengkapiImage'); ?>   
<div class="row">
  <div class="col-lg-12 col-xl-6  col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title;?></h4>
        <div class="row mt-3">
          <div class="col-lg-12 col-md-12  pr-1">
            <img src="<?= base_url('assets/image/users/'.$user['image']);?>" class="mb-2 mw-100 w-100">
            <div class="form-group">
              <input type="file" name="image" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info"placeholder="Upload Image" disabled>
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button">File</button>
                </span>
              </div>
            </div>
            <div class="custom-file mb-4">
              <button type="submit" class="btn btn-primary col-md-12">Upload</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</div>

<?php echo form_close();?>