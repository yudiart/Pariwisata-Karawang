              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y');?> <a href="https://www.vodonesia.id/" target="_blank">Vodonesia Project</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"><i class="mdi mdi-lock text-danger"></i><a href="https://www.termsfeed.com/privacy-policy/8e144a062a692c69eb029b013eb4450e">Privacy Policy</a> </span>
            </div>
          </footer>
        </div>
      </div>
    </div>
    
<!-- Modal -->
<div id="dataModal" class="modal fade ">
  <div class="modal-dialog modal-full-height w-100 modal-right col-lg-12 modal-notify modal-info">
    <div class="modal-content card  shadow-sm bg-white rounded">
      <div class="modal-header  btn-primary rounded">
          <p class="heading lead ">Booking Kamar</p>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">×</span>
          </button>
      </div>
      <form method="post" action="<?= base_url('Booking/bookingDetails');?>">
        <div class="modal-body col-lg-12 ">
          <div class="md-form mb-2 ">
                <input type="text" id="kdkamar" class="form-control validate" data-role="tagsinput" hidden/>
              </div>
              <div class="form-group mb-2">
                <i class="mdi mdi-home"></i>
                <label>Nama Kamar</label>
                <input type="text" id="namakamar" class="form-control validate" data-role="tagsinput" readonly/>
              </div>
              <div class="form-group mb-2">
                <i class="mdi mdi-home"></i>
                <label>Kapasitas Ruangan</label>
                <p id="capacity"> Orang</p>
              </div>
              <div class="form-group mb-2">
                <i class="mdi mdi-account"></i>
              <label for="exampleFormControlSelect1">Orang Dewasa</label>
              <select class="form-control" id="num_adult" name="num_adult">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
          </div>
          <div class="form-group mb-2">
                <i class="mdi mdi-account"></i>
              <label for="exampleFormControlSelect1">Anak Kecil</label>
              <select class="form-control" id="num_kids" name="num_kids">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
          </div>
          <div class="form-group"> <!-- Date input -->
            <label class="control-label">Check In</label>
            <input class="form-control" id="dt1" name="check_in" placeholder="MM/DD/YYY" type="text" />
          </div>
          <div class="form-group"> <!-- Date input -->
            <label class="control-label">Check Out</label>
            <input class="form-control " id="dt2" name="check_out" placeholder="MM/DD/YYY" type="text"/>
          </div>
          <hr>
          <div class="form-group"> <!-- Date input -->
            <label class="control-label " >harga</label>
            <h3 id="harga" class="harga"></h3>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Booking Now</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('vendor/purple/assets/vendors/js/vendor.bundle.base.js');?>"></script>
<script src="<?= base_url('vendor/purple/assets/vendors/chart.js/Chart.min.js');?>"></script>
<script src="<?= base_url('vendor/purple/assets/js/off-canvas.js');?>"></script>
<script src="<?= base_url('vendor/purple/assets/js/hoverable-collapse.js');?>"></script>
<script src="<?= base_url('vendor/purple/assets/js/misc.js');?>"></script>

<script src="<?= base_url('vendor/purple/assets/js/todolist.js');?>"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?= base_url('assets/js/script.js');?>"></script>

  </body>
</html>