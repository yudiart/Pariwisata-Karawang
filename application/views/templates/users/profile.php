<div class="row">
  <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <img src="<?= base_url('assets/image/users/'.$user['image']);?>" alt="Owl Image" class="mw-100">
      </div>
    </div>
  </div>
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="clearfix">
           <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['firstname'];?> <?= $user['lastname'];?>" disabled>
          </div>
          <div class="form-group">
           <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control"value="<?= $user['email'];?>" disabled >
          </div>
          <?php foreach($udtl as $ud): ?>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $ud['jk'];?>" disabled>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $ud['alamat'];?>" disabled>
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">No.HP</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="+62<?= substr($ud['no_hp'],1);?>" disabled>
          </div>
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
        <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>

</div>
  
