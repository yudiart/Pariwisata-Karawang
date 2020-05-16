<nav class="fixed-top navbar navbar-expand-lg  navbar-inverse navbar-light bg-light fixed boxshadow">
	<div class="container">
		<nav class="navbar navbar-light bg-light mr-6">
		  <a class="navbar-brand " href="#">
		    <img src="<?=base_url('assets/logo/fix.png');?>" width="30" height="30" class="d-inline-block align-top" alt="">
		    WisataYuk
		  </a>
		</nav>
	  
	  <button class="navbar-toggler toogler" onclick="myFunction()" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse right navbar-collapse col-lg-7 mr-6" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto col-lg-9">
	      <li class="nav-item active pr-2">
	        <a class="nav-link" href="<?= base_url('');?>">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item pr-2">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item dropdown pr-2">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	    </ul>
	  </div>
  		<div class=" collapse left navbar-collapse" id="navbarSupportedContent">
	   		<?php if ($user['role_id'] != null): ?>
  				<div class="btn-group b-primary" id="icongroup" data-dismiss="icongroup">  					
                	<a href="" class="nav-link favicon"><i class="mdi mdi-cart"></i></a>
                	<a href="" class="nav-link favicon"><i class="mdi mdi-bell"></i></a>
                	<a href="" class="nav-link favicon"><i class="mdi mdi-message"></i></a>
  				</div>
                <div class="btn-group">               	
	                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="background:#F8F8F8;height:50px;padding-top:5px;padding-left:5px;padding-right: 15px;">
	                 <img class="mr-2" src="<?= base_url('assets/image/users/'.$user['image'])?>" style="width:40px;height:40px; border-radius:50px;">
	                </button>
	                <div class="dropdown-menu" id="icon-list2">
	                  <a class="dropdown-item " href="#"><i class="mdi mdi-account icon-list"></i>Profile</a>
	                  <div class="dropdown-divider"></div>
	                  <a class="dropdown-item" href="#"><i class="mdi mdi-earth icon-list"></i> Log Wisata</a>
	                  <a class="dropdown-item" href="#"><i class="mdi mdi-settings icon-list"></i> Settings</a>
	                  <div class="dropdown-divider"></div>
	                  <a class="dropdown-item " href="<?= base_url('Auth/logout');?>"><i class="mdi mdi-logout icon-list"></i>Logout</a>
	                </div>
	            </div>
  			<?php endif ?>
        </div>
	</div>

</nav>
