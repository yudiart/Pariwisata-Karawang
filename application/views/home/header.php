<div class="wrapper">
	<div class="topbar ">
		<div class="containers">
			<ul class="navbar-item t-primary">
				<li><a class="t-primary" href="#">About</a></li>
				<li><a class="t-primary" href="#"><i class="mdi mdi-home"> </i>Mitra Villa</a></li>
				<li><a class="t-primary" href="#"><i class="mdi mdi-account-multiple"> </i> Comunity</a></li>
			</ul>			
		</div>
	</div>
	<nav class="nav b-white">
		<div class="containers">
			<label class="logo">
				<a class="text-logo t-primary" href="<?= base_url('Home');?>">
					<img src="<?= base_url('assets/logo/logo_web.png');?>" alt="image" style="width:50px;"/>WisataYuk
				</a>
			</label>
			<ul class="navbar-item">
				<li><a class="active" href="#"><i class="mdi mdi-home"> </i>Home</a></li>
				<li><a class="t-primary"href="<?= base_url('Home/About');?>">Article</a></li>
				<li><a class="t-primary"href="<?= base_url('Home/Service');?>">Wisata</a></li>
				<li><a class="t-primary"href="<?= base_url('Home/Contact');?>">Budaya</a></li>
				<li><a class="t-primary"href="<?= base_url('Home/Feedback');?>">Feedback</a></li>
				<?php if ($user['role_id'] == null): ?>
					
				<div class="vl">
					<ul>
						<li><a href="#"><i class="mdi mdi-camcorder-box-off"></i>icon</a></li>
						<li><a class="t-primary" href="<?= base_url('Account/Login');?>">Login</a></li>
					</ul>
				</div>
			<?php elseif ($user['role_id'] != null):?>
				<div class="vl">
					<ul>

						<li><a class="t-primary" href="#"><?=substr($user['firstname'],0,15);?></a></li>
						
					</ul>
				</div>
				<?php endif ?>
			</ul>
			
		</div>
	</nav>	
				

	
