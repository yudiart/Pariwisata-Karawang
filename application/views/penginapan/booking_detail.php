<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="clearfix">
          <div class="row">
          <?php foreach ($_pk as $pk):?>
            <div class="col-lg-4 col-sm-12 col-xs-12  mb-4">
              <div class="row">
              <img src="<?= base_url('assets/image/penginapan/kamar/'.$pk->image);?>" alt="Image" style="width:100%;height:300px;object-fit: cover;"/>
              </div>
            </div>
            <div class="col-lg-7 col-sm-12 col-md-12 col-xs-12">
              <div class="col-lg-12 ">
                <?php foreach ($_pkd->result() as $p):?>
                  <small class=""><i class="mdi mdi-home"></i><?= $p->nama_penginapan;?></small>
                <h3><strong><?= $pk->nama_kamar?></strong></h3>
                <hr>
                <?php endforeach; ?>
              </div>
              
              <div class="col-lg-12">
                <div class="row" >
                  <div class="col-sm-2">
                    <h6>Harga</h6>
                  </div>
                  <div class="col-sm-4">
                    <h3 class="text-danger"><strong>Rp.<?= $pk->harga;?></strong></h3>
                  </div>
                </div>   
                <hr> 
                <div class="row" >
                  <div class="col-sm-2">
                    <h6>Description</h6>
                  </div>
                  
                  <div class="col-sm-8">
                    <p style="text-align: justify;"><?=$pk->description?></p>
                    <h6 class="text-danger"><strong></strong></h6>
                  </div>
                </div>  
                <hr>
                <div class="row" >
                  <div class="col-sm-2">
                    <h6>Capacity</h6>
                  </div>
                  
                  <div class="col-sm-8">
                    <p style="text-align: justify;"><?=$pk->capacity;?> Orang</p>
                    <h6 class="text-danger"><strong></strong></h6>
                  </div>
                </div> 
                <hr>           
              <?php foreach ($_pks->result() as $pks):?>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>Type Bed</h6>
                  </div>
                  <div class="col-sm-8">
                    <p style="text-align: justify;"><?=$pks->type_bed?></p>
                    <h6 class="text-danger"><strong></strong></h6>
                  </div>
                </div>
                <hr>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>AC</h6>
                  </div>
                  <div class="col-sm-8">
                    <?php if ($pks->ac ==1): ?>
                      <p style="text-align: justify;">Ya</p>
                    <?php elseif ($pks->ac ==0): ?>
                      <p style="text-align: justify;">Tidak</p>
                    <?php endif ?>
                    <h6 class="text-danger"><strong></strong></h6>
                  </div>
                </div>
                <hr>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>TV</h6>
                  </div>
                  <div class="col-sm-8">
                    <?php if ($pks->tv==1): ?>
                      <p style="text-align: justify;">Ya</p>
                    <?php elseif ($pks->tv ==0): ?>
                      <p style="text-align: justify;">Tidak</p>
                    <?php endif ?>
                  </div>
                </div>
                <hr>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>Break Fast</h6>
                  </div>
                  <div class="col-sm-8">
                    <?php if ($pks->break_fast ==1): ?>
                      <p style="text-align: justify;">Ya</p>
                    <?php elseif ($pks->break_fast ==0): ?>
                      <p style="text-align: justify;">Tidak</p>
                    <?php endif ?>
                  </div>
                </div>
                <hr>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>Ruang Tamu</h6>
                  </div>
                  <div class="col-sm-8">
                    <?php if ($pks->ruang_tamu ==1): ?>
                      <p style="text-align: justify;">Ya</p>
                    <?php elseif ($pks->ruang_tamu ==0): ?>
                      <p style="text-align: justify;">Tidak</p>
                    <?php endif ?>
                  </div>
                </div>
                <hr>
                <div class="row" >   
                  <div class="col-sm-2">
                    <h6>Kamar Mandi</h6>
                  </div>
                  <div class="col-sm-8">
                    <?php if ($pks->kamar_mandi ==1): ?>
                      <p style="text-align: justify;">Ya</p>
                    <?php elseif ($pks->kamar_mandi ==0): ?>
                      <p style="text-align: justify;">Tidak</p>
                    <?php endif ?>
                  </div>
                </div>
                <hr>
              <?php endforeach; ?>
              </div>
              <div class="col-lg-12">
                <a class="btn btn-primary text-white mb-4"
                    id="booking_detail" 
                    style="cursor:pointer"
                    data-toggle="modal" 
                    data-target="#dataModal"
                    data-kdkamar="<?= $p->kd_kamar;?>"
                    data-kamarname="<?= $p->nama_kamar;?>"
                    
                    >Booking Now</a>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>