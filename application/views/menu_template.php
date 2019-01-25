<ul class="nav nav-list">
	
	<?php if($this->session->userdata('loggedin')==1){ ?>
	<li class="
	<?php 
		if($menu=='Home'){
			echo 'active';
		}
	?> ">
		<a href="<?php echo base_url()?>">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Home </span>
		</a>

		<b class="arrow"></b>
	</li>	
	
	<li class="
	<?php 
		if($menu=='Produk' || $menu=='Kriteria' || $menu=='Subkriteria'){
			echo 'active';
		}
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-archive "></i>
			<span class="menu-text"> Master </span> 
			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url()?>Kriteria">
					<i class="menu-icon fa fa-caret-right"></i>
					Kriteria
				</a> 
				<b class="arrow"></b>
			</li>
			
			<li class="">
				<a href="<?php echo base_url()?>Subkriteria">
					<i class="menu-icon fa fa-caret-right"></i>
					Sub Kriteria (SAW)
				</a> 
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url()?>Produk">
					<i class="menu-icon fa fa-caret-right"></i>
					Produk
				</a>
				<b class="arrow"></b>
			</li> 
		</ul>
	</li>

	<li class="
	<?php 
		if($menu=='Alternatif' || $menu=='Bobot' || $menu=='Peringkat'){
			echo 'active';
		}
	?> 
	">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-list"></i>
			<span class="menu-text"> Transaksi </span> 
			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url()?>Bobotahp">
					<i class="menu-icon fa fa-caret-right"></i>
					Perhitungan (AHP)
				</a> 
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url()?>Bobotkriteria">
					<i class="menu-icon fa fa-caret-right"></i>
					Bobot Kriteria
				</a> 
				<b class="arrow"></b>
			</li>
			

			<li class="">
				<a href="<?php echo base_url()?>Alternatif">
					<i class="menu-icon fa fa-caret-right"></i>
					Perhitungan (SAW)
				</a> 
				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url()?>Peringkat">
					<i class="menu-icon fa fa-caret-right"></i>
					Peringkat Alternatif
				</a> 
				<b class="arrow"></b>
			</li>

		</ul>
	</li>

	<li class="
	<?php 
		if($menu=='Laporan'){
			echo 'active';
		}
	?>">
		<a href="<?php echo base_url()?>Laporan">
			<i class="menu-icon  fa fa-list-alt "></i>
			<span class="menu-text"> Laporan </span>
		</a>

		<b class="arrow"></b>
	</li>


	<li class="
	<?php 
		if($menu=='Profil'){
			echo 'active';
		}
	?>
	">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text"> Profile </span> 
			<b class="arrow fa fa-angle-down"></b>
		</a>
	
		<b class="arrow"></b>
	
		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url()?>Profil">
					<i class="menu-icon fa fa-caret-right"></i>
					Profil
				</a> 
				<b class="arrow"></b>
			</li>
	
			<li class="">
				<a href="<?php echo base_url()?>Profil/password">
					<i class="menu-icon fa fa-caret-right"></i>
					Password
				</a>
				<b class="arrow"></b>
			</li> 
		</ul>
	</li>
	<?php } ?>
		<?php if($this->session->userdata('loggedin')==1){ ?>
				<li class="">
					<a href="<?php echo base_url()?>Login/logout">
						<i class="menu-icon  fa fa-sign-out "></i>
						<span class="menu-text"> Logout </span>
					</a>

					<b class="arrow"></b>
				</li>
		<?php }else{?>
				<li class="<?php 
					if($menu=='Login'){
						echo 'active';
					}
				?>
				">
					<a href="<?php echo base_url()?>Login">
						<i class="menu-icon  fa fa-sign-in "></i>
						<span class="menu-text"> Login </span>
					</a>

					<b class="arrow"></b>
				</li>
		<?php } ?> 
</ul><!-- /.nav-list -->