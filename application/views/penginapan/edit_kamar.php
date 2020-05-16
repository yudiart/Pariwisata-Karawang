<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?= $title;?></h4>
       <?= $this->session->flashdata('message');?>
        <?php foreach ($_pk as $i):?>
        <?php echo form_open_multipart('Penginapan/updateKamar/'.$i->kd_kamar); ?>   
          <div class="form-group" hidden>
            <label for="exampleInputEmail3">kd_kamar</label>
            <input type="text" class="form-control" id="exampleInputEmail3" name="kd_kamar" value="<?= $i->kd_kamar;?>">
            <?= form_error('nama_kamar','<small class="text-danger">','</small>');?>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Nama Kamar</label>
            <input type="text" class="form-control" id="exampleInputEmail3" name="nama_kamar" value="<?= $i->nama_kamar;?>">
            <?= form_error('nama_kamar','<small class="text-danger">','</small>');?>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Type Kamar</label>
            <select class="form-control" name="type">
              <option value="<?= $i->type;?>"><?= $i->type;?></option>
              <option value="2">Superior</option>
              <option value="3">Deluxe</option>
              <option value="4">Junior Suite</option>
              <option value="5">Suite</option>
              <option value="6">Presidential</option>
              <option value="7">Standard Room</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3"><i class="mdi mdi-account"></i>Capacity</label>
            <select class="form-control" name="capacity">
              <option value="<?= $i->capacity;?>"><?= $i->capacity;?> Orang</option>
              <option value="1">1 Orang</option>
              <option value="2">2 Orang</option>
              <option value="3">3 Orang</option>
              <option value="4">4 Orang</option>
              <option value="5">5 Orang</option>
              <option value="6">6 Orang</option>
              <option value="7">7 Orang</option>
              
            </select>
          </div>
          <div class="form-group">
            <img src="<?= base_url('assets/image/penginapan/kamar/').$i->image;?>" style="max-width:200px;">
          </div>
          <div class="form-group">
            <label>File Upload</label>
            <input type="file" name="image_kamar" class="p-2 col-lg-12" style="border:0.5px solid #F0F0F0;border-radius:5px;">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description"><?= $i->description;?></textarea>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-gradient-primary text-white">Rp.</span>
              </div>
              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="harga" value="<?= $i->harga;?>">

            </div>
            <?= form_error('harga','<small class="text-danger">','</small>');?>
          </div>
          <hr>  
          <h3>  Fasilitas</h3>
        <div class="form-group">
          <div class="row"> 
            <div class="col-lg-6 col-sm-12 col-md-6">
              <div class="form-check form-check-primary">  
                <label class="form-check-label">
                  <input type="hidden" class="form-check-input" name="check_ac" value="0">
                  <input type="checkbox" class="form-check-input" name="check_ac" value="1">AC
                </label>
              </div>
              <div class="form-check form-check-primary">  
                <label class="form-check-label">
                  <input type="hidden" class="form-check-input" name="check_tv" value="0">
                  <input type="checkbox" class="form-check-input" name="check_tv" value="1">TV
                </label>
              </div>
              <div class="form-check form-check-primary">  
                <label class="form-check-label">
                  <input type="hidden" class="form-check-input" name="check_rt" value="0">
                  <input type="checkbox" class="form-check-input" name="check_rt" value="1">Ruang Tamu
                </label>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6">
              <div class="form-check form-check-primary">  
                <label class="form-check-label" >
                   <input type="hidden" class="form-check-input" name="check_km"value="0">
                  <input type="checkbox" class="form-check-input" name="check_km"value="1">Kamar Mandi
                </label>
              </div>
              <div class="form-check form-check-primary">  
                <label class="form-check-label" >
                  <input type="hidden" class="form-check-input" name="check_bf"value="0">
                  <input type="checkbox" class="form-check-input" name="check_bf"value="1">Break Fast
                </label>
              </div>
            </div>
          </div>
        </div>

         <?php endforeach; ?>
          <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
          <a class="btn btn-light" href="<?= base_url('Penginapan/kamar');?>">Cancel</a>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>