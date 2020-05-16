<!-- Data Modal -->
<div id="dataModal" class="modal fade ">
  <div class="modal-dialog ">
    <div class="modal-content  shadow-sm bg-white rounded">
      <div class="modal-header  b-primary rounded">
          <p class="heading lead  ">Booking Kamar</p>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">×</span>
          </button>
      </div>
      <form method="post" action="<?= base_url('Booking/bookingDetails');?>">
        <div class="modal-body col-lg-12 ">
          
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
            <input class="form-control" id="dt2" name="check_out" placeholder="MM/DD/YYY" type="text"/>
          </div>
          <hr>
          <div class="form-group"> <!-- Date input -->
            <label class="control-label">harga</label>
            <h3>Rp.<h3 id="harga"></h3></h3>
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

<script>
  $(document).ready(function(){
    $(document).on('click','#booking_detail', function(){
      var kd_kamar = $(this).data('kdkamar');
      var harga = $(this).data('harga');
      var nama_kamar = $(this).data('kamarname');
      $('#namakamar').val(nama_kamar);
      $('#kdkamar').val(kd_kamar);
      $('#dataModal').modal('show');
      $('#harga').text(harga);
    });
  });

</script>

    <footer class="pt-5">

        <div class="container">
          <div class="row">
            <div class="col-lg-12 t-white mt-2">
              <div class="row">
                <div class="col-lg-4 text-left mb-4" >
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-4">
                          <img src="<?= base_url('assets/image/1.png');?>" style="width:100px;">
                        </div>
                        <div class="col-lg-8">
                          <div class="lg-12">
                            <h3 class="mt-2 pr-5">Contact Us</h3>
                          </div>
                          <div class="lg-12 text-link">
                            <a href="https://api.whatsapp.com/send?phone=6285695190268&text=hi%20how%20are%20you&source=&data="><small><i class="mdi mdi-phone t-primary"></i> +62 856 - 9519 - 0268</small></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                      <p>Memiliki Penginapan / hotel?</p>
                      <a href="<?= base_url('auth/registration');?>" class="btn btn-outline-secondary"><i class="mdi mdi-plus"></i>Join With WisataYuk</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 ">                  
                  <div class="lg-12 text-left">
                    <h3 >About WisataYuk</h3>
                    <div class="t-gray text-link">
                      <a href="https://api.whatsapp.com/send?phone=6285695190268&text=hi%20how%20are%20you&source=&data="><p><i class="mdi mdi-phone t-primary"></i> Contact Us</p></a>
                      <a href="#"><p><i class="mdi mdi-help-circle t-primary"></i> Help Center</p></a>
                      <a href="#"><p><i class="mdi mdi-information-outline t-primary"></i> About Us</p></a>
                    </div>
                  </div>
                  <div class="lg-12 text-left">
                    <h3>Follow Us On</h3>
                    <div class="t-gray text-link">
                      <a href="#"><p><i class="mdi mdi-youtube t-primary"></i> Youtube</p></a>
                      <a href="#">
                        <p><i class="mdi mdi-facebook t-primary"></i> Facebook</p>
                      </a>
                      <a href="#">
                        <p><i class="mdi mdi-instagram t-primary"></i> Instagram</p>
                      </a>
                      <a href="#">
                        <p><i class="mdi mdi-twitter t-primary"></i> Twitter</p>
                      </a>                        
                    </div>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="lg-12 text-left">
                    <h3>Products</h3>
                    <div class="t-gray text-link">
                      <a href="#">
                        <p><i class="mdi mdi-image-filter-hdr t-primary"></i> Pariwisata</p>
                      </a>
                      <a href="#">
                        <p><i class="mdi mdi-home t-primary"></i> Penginapan</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                  <div class="lg-12 text-left">
                    <h3>Others</h3>
                    <div class="t-gray text-link">
                      <a href="#">
                        <p><i class="mdi mdi-lock t-primary"></i><a href="https://www.termsfeed.com/privacy-policy/8e144a062a692c69eb029b013eb4450e" class="t-primary"> Privacy Policy</a></p>
                      </a>
                      <a href="#">
                        <p><i class="mdi mdi-recycle t-primary"></i> Term & Condition</p>
                      </a>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <div class="row">
          <div class="col-sm-12 mt-2">
              <hr style="background:#686868;">
            <div class="container">
              <div class="row">
                <div class="col-lg-5">
                  <div class="text-center pt-2 pb-2">
                    <p class="t-white">Copyright © <?= date('Y');?> <a href="https://www.vodonesia.id/" target="_blank" class="t-primary">Skripsi project</a>. All rights reserved.</p>
                  </div>
                </div>
                <div class="col-lg-3"></div>
                <div class="col-lg-4 col-md-12">
                  <div class="text-center pt-2 pb-2">
                    <p class="t-white">Design By <i class="mdi mdi-heart t-primary"></i> <a href="https://www.instagram.com/myudi__/" target="_blank" class="t-primary">Mochamad Yudi Sobari</a>.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  	
    </footer>
    <script src="<?= base_url('assets/js/script.js');?>"></script>
    <script src="<?= base_url('vendor/purple/assets/vendors/js/vendor.bundle.base.js');?>"></script>
  </body>
</html>
