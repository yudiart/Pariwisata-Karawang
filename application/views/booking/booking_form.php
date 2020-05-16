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
              </div>
              <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-userid="<?= $pk->kd_kamar;?>"data-target="#modalPoll-1">Booking Now</button>

                <!-- Modal: modalPoll -->
                <div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true" data-backdrop="false">
                  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
                    <div class="modal-content card  shadow-sm bg-white rounded">
                      <!--Header-->
                      <div class="modal-header col-12 btn-primary text-center">
                        <p class="heading lead ">Feedback request
                        </p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="white-text">×</span>
                        </button>
                      </div>

                      <!--Body-->
                      <div class="modal-body">
                        <div class="text-center">
                          <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                          <p>
                            <strong>Your opinion matters</strong>
                          </p>
                          <p>Have some ideas how to improve our product?
                            <strong>Give us your feedback.</strong>
                          </p>
                        </div>

                        <hr>

                        <!-- Radio -->
                        <p class="text-center">
                          <strong>Your rating</strong>
                        </p>
                        <div class="form-check mb-4">
                          <input class="form-check-input" name="group1" type="radio" id="radio-179" value="option1" checked>
                          <label class="form-check-label" for="radio-179">Very good</label>
                        </div>

                        <div class="form-check mb-4">
                          <input class="form-check-input" name="group1" type="radio" id="radio-279" value="option2">
                          <label class="form-check-label" for="radio-279">Good</label>
                        </div>

                        <div class="form-check mb-4">
                          <input class="form-check-input" name="group1" type="radio" id="radio-379" value="option3">
                          <label class="form-check-label" for="radio-379">Mediocre</label>
                        </div>
                        <div class="form-check mb-4">
                          <input class="form-check-input" name="group1" type="radio" id="radio-479" value="option4">
                          <label class="form-check-label" for="radio-479">Bad</label>
                        </div>
                        <div class="form-check mb-4">
                          <input class="form-check-input" name="group1" type="radio" id="radio-579" value="option5">
                          <label class="form-check-label" for="radio-579">Very bad</label>
                        </div>
                        <!-- Radio -->

                        <p class="text-center">
                          <strong>What could we improve?</strong>
                        </p>
                        <!--Basic textarea-->
                        <div class="md-form">
                          <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
                          <label for="form79textarea">Your message</label>
                        </div>

                      </div>

                      <!--Footer-->
                      <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-primary text-white waves-effect waves-light">Send
                          <i class="fa fa-paper-plane ml-1"></i>
                        </a>
                        <a type="button" class="btn btn-danger text-white waves-effect" data-dismiss="modal">Cancel</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal: modalPoll -->
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>