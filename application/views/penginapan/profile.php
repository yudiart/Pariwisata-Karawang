<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="clearfix">
          <?php foreach($idp as $id): ?>
          <!-- dropdown-divider -->
          <h1><?= $title;?></h1>
          <div class="dropdown-divider mt-2" style='border:0.5px solid grey'></div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Penginapan</label>
            <input type="email" class="form-control"value="<?= $id['nama_penginapan'];?>" disabled>
          </div>
          
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" disabled><?= $id['description'];?></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $id['alamat'];?>" disabled>
          </div>
          <?php endforeach; ?>
          <div class="form-group">
            <?php foreach($role as $r): ?>
              <label for="exampleInputEmail1">Status</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $r['role'];?>" disabled>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <?php foreach ($_ip as $ip):?>
          <img src="<?= base_url('assets/image/penginapan/'.$ip['image']);?>" alt="Penginapan Profile" class="mw-100 w-100 p-2"/>
        <?php endforeach; ?>
        <a href="#" class="btn btn-primary col-12">Change Profile</a>
      </div>
    </div>
  </div>
</div>