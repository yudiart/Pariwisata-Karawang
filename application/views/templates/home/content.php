<div class="content mb-6">
	<div class="container">
			<div class="row ">
  			<div class="p-box-left col-lg-3 b-white boxshadow">
  				<?php if ($user['role_id'] != null): ?>
  				<div class="col-lg-12 b-white ">
            <div class="row">
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background:#F8F8F8;height:50px;padding-top:5px;padding-left:5px;padding-right: 15px;">
                 <img class="mr-2" src="<?= base_url('assets/image/users/'.$user['image'])?>" style="width:40px;height:40px; border-radius:50px;"><a class="t-white" ><?=$user['firstname']?> <?=$user['lastname']?></a>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item " href="#"><i class="mdi mdi-account icon-list"></i>Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-cart icon-list"></i>Cart</a>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-heart icon-list"></i> Whist list</a>
                  <a class="dropdown-item" href="#"><i class="mdi mdi-settings icon-list"></i> Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item " href="#"><i class="mdi mdi-logout icon-list"></i>Logout</a>
                </div>
              </div>
            </div>
  				</div>
  				<?php endif ?>
  				<div class="p-box-col mt-4">
  					<div class="">
  						<i class="mdi mdi-home"></i><a href="#">Panel Box Search Komponent</a>
  					</div>
  				</div>
  				<div class="p-box-col">
  					<div class="">
  						<i class="mdi mdi-home"></i><a href="#">Panel Box Search Komponent</a>
  					</div>
  				</div>
  				<div class="p-box-col">
  					<div class="">
  						<i class="mdi mdi-home"></i><a href="#">Panel Box Search Komponent</a>
  					</div>
  				</div>
  				<div class="p-box-col">
  					<div class="">
  						<i class="mdi mdi-home"></i><a href="#">Panel Box Search Komponent</a>
  					</div>
  				</div>
  				<div class="p-box-col">
  					<div class="">
  						<i class="mdi mdi-home"></i><a href="#">Panel Box Search Komponent</a>
  					</div>
  				</div>
  			</div>
			<div class="p-box-right col-lg-9  b-white boxshadow" style="background:#F8F8F8">
        <div class="" style="min-height:500px;">
  				<?php foreach ($apk->result() as $pk):?>
  					<a href="" class="text-link" style="text-decoration: none;">
              <div class="col-md-12 ">
                <div class="box-card overflow-auto boxshadow mb-4 mr-2 ml-2">
                  <div class="card-title">
                    <img src="<?=base_url('assets/image/penginapan/kamar/'.$pk->image);?>"style="width:100%;height:120px;object-fit: cover;">
                    <strong><h5 class="text-center mt-2"><?=substr($pk->nama_kamar,0,12)?>..</h5></strong>
                    <div class="k-desc">
                      <small class=""><?= substr($pk->desc_pk,0,50);?></small>
                      
                    </div>
                    <small class="t-primary-dark"><i class="mdi mdi-home"></i><?= $pk->nama_penginapan?></small>
                  </div>
              <!-- </div> -->
                    <a style="cursor:pointer;width:100%;"
                      class="btn bg-primary text-white"
                      id="booking_detail" 
                      data-toggle="modal" 
                      data-target="#dataModal"
                      data-kdkamar="<?= $pk->kd_kamar;?>"
                      data-harga="<?= $pk->harga;?>"
                      data-capacity="<?= $pk->capacity;?>"
                      data-kamarname="<?= $pk->nama_kamar;?>">Rp.<?= $pk->harga;?>
                    </a>
                </div>    
              </div>                
  					</a>
  				<?php endforeach; ?>
          
        </div>
			</div>
		</div>
	</div>

</div>
<!-- End Container -->
