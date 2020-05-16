<div class="row">
	<div class="page-header col-lg-10">
		<div class="row">
		<nav aria-label="breadcrumb">
		  <ul class="breadcrumb">
			<li><a href="<?= base_url('Penginapan/tambahKamar');?>" class="page-title" style="text-decoration: none;color:grey;">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
				<i class="mdi mdi-plus"></i>
				</span> Tambah Kamar </a>
			</li>
			<li>
			  
			</li>
		  </ul>
		</nav>
		</div>
	</div>
	<div class="col-lg-10 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<h4 class="card-title">Data <?= $title;?></h4>
			<p class="card-description">Lorem Ipsum is simply dummy text of the printing 
				and typesetting industry.
			</p>
			<?= $this->session->flashdata('message');?>
			<table class="table">
			  <thead>
				<tr>
				  <th> Image </th>
				  <th> Nama Kamar </th>
				  <th> Deskripsi </th>
				  <th> Type </th>
				  <th> Harga </th>
				  <th> Action </th>
				</tr>
			  </thead>
			<?php foreach ($pk->result() as $i):?>   

			  <tbody>
				<tr>
				  <td class="">
					  <img src="<?= base_url('assets/image/penginapan/kamar/'.$i->image);?>" alt="Image" style="width:60px;height:60px;"/>
				  </td>
				  <td> <?= $i->nama_kamar;?></td>
				  <td> <textarea disabled style="border:none;background:none;width:100%;"><?= $i->description;?></textarea>
				  </td>
	
				  		<td> <?= $i->type;?> </td>		 
 	
					

				  <td> Rp.<?= $i->harga;?> </td>
				  <td>
					<a href="<?= base_url('Penginapan/editKamar/'.$i->kd_kamar);?>" class="badge badge-warning"><i class="mdi mdi-lead-pencil"></i> Edit</a>
					<a href="<?= base_url('Penginapan/deleteKamar/'.$i->kd_kamar);?>" class="badge badge-danger"><i class="mdi mdi-delete"></i> delete</a>
				  </td>
				</tr>
				
			  </tbody>

			 <?php endforeach; ?>
			</table>
		  </div>
		</div>
	</div>

</div>