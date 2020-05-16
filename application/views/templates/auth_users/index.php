<div class="container">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <div class="panel pt-5">
      <div class="card">
        <div class="card-title text-center">
          <img src="<?= base_url('assets/logo/logo.png');?>" alt="image" style="width:150px;"/>
          <hr>
          <h2><?= $title;?></h2>
        </div>
      </div>
      <form class="mb-2 form" method="post" action="">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn b-primary">Submit</button>
        <button type="button" class="btn btn-secondary" id="cancle">Cancle</button>
      </form>
        <p class="">Belum memiliki Account? <a href="">Register disini</a></p>
      
    </div>
  </div>
  <div class="col-lg-4"></div>
</div>
<script>
  $('#cancle').on('click', function(){
    window.location.replace("<?=base_url();?>")
  });
</script>