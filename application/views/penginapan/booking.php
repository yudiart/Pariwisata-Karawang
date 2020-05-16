<div class="col-lg-12">
	<div class="row">
		<?php foreach ($apk->result() as $p):?>
			<div class="card col-lg-3 mr-2 ml-2 mb-4" style="border-radius:10px;">
				<div class="row">
				<a href="<?= base_url('booking/detail/'.$p->kd_kamar);?>" id="<?= $p->kd_kamar?>" style="text-decoration: none;color:black;">
			 		<img src="<?= base_url('assets/image/penginapan/kamar/'.$p->image);?>" alt="Image" style="width:100%;height:250px;object-fit: cover;border-radius:10px 10px 0px 0px"/>
			 	</a>
				</div>
				<div class="card-body row">
				<a href="<?= base_url('booking/detail/'.$p->kd_kamar);?>" style="text-decoration: none;color:black;">
					<div class="card-text">
						<div class="card-title">
					    	<h3><?=$p->nama_kamar;?></h3>
					    </div>
					    <div class="mark figure-caption">
					    	<small class="card-text "><i class="mdi mdi-home"></i><?=$p->nama_penginapan?></small>
						</div>
				    <p class="card-text" style="text-align: justify;"><?= substr($p->desc_pk,0,100);?></p>
				    <p class="card-text" ><i class="mdi mdi-account"></i><?= $p->capacity;?> Orang</p>
				    </div>
		 		</a>
			  	</div>
			  	<div class="card-title ml-4">
					<h1 class="text-danger"><b>Rp.<?=$p->harga;?></b></h1>
				</div>
					<a class="btn btn-primary text-white mb-4"
					style="cursor:pointer"
					id="booking_detail" 
					data-toggle="modal" 
					data-target="#dataModal"
					data-kdkamar="<?= $p->kd_kamar;?>"
					data-kamarname="<?= $p->nama_kamar;?>"
					data-capacity="<?= $p->capacity;?>"
					data-harga="<?= $p->harga;?>">Booking Now</a>
		  </div>
		<?php endforeach; ?>
	</div>
</div>
