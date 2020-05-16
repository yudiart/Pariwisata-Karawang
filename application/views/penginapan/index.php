      <?php echo form_open_multipart('Penginapan/lengkapiPenginapan'); ?>   
      <div class="row mb-3">
      <!--  -->
      <div class="card col-md-7  mr-1 ml-1 mb-3">
        <div class="input-group mt-4">
          <div class="title">
            <h1><?= $title;?></h1>
          </div>
        </div>
         <?= $this->session->flashdata('message');?>
        <!-- dropdown-divider -->
        <div class="dropdown-divider mt-2" style='border:0.5px solid grey'></div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Penginapan</label>
          <input type="text" class="form-control" name="nama_penginapan">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Deskripsi</label>
          <textarea type="text" class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Alamat</label>
          <input type="text" class="form-control" name="alamat">
        </div>


        <div class="input-group">
          <button type="submit" class="btn btn-primary mb-3 col-md-6 col-lg-4">Submit</button>
        </div>
      </div>
    </div>
    <?php echo form_close();?>