		<?php $request = \Config\Services::request(); ?>
		<?php $level = session()->get('level_users')['nama_lev'] ?>

		<!-- Main Sidebar Container -->
		<aside id="sidebar" class="main-sidebar main-sidebar-custom sidebar-light-danger elevation-4">
			<!-- Brand Logo -->
			<a href="<?php echo base_url() ?>/<?php echo $level ?>/Home" class="brand-link pl-0">
				<img src="<?php echo base_url() ?>/public/berkas/uploads/logo/CCTV PGK.png" alt="Logo CCTV" class="brand-image img-square">
				<h2 class="brand-text font-weight-bold text-center" style="color: #940000;"> CCTV PGK </h2>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url() ?>/public/berkas/users/<?php echo session()->get('level_users')['foto_u'] ?>" class="img-circle" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><b><?php echo session()->get('level_users')['nama_u'] ?></b></a>
						<a href="#" class="d-block"><?php echo session()->get('level_users')['alias_lev'] ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
						<!--Category name-->
						<li class="list-header">DAFTAR MENU</li>

						<li class="nav-item">
							<a href="<?php echo base_url() ?>/<?= $level ?>/Home" class="nav-link <?php if ($request->uri->getSegment(2) == "Home") { ?>active<?php } ?>">
								<i class="nav-icon fas fa-home"></i>
								<p></p>
								Beranda
								</p>
							</a>
						</li>

						<li class="nav-item <?php if ($request->uri->getSegment(3) == "tampil_users" || $request->uri->getSegment(3) == "tampil_level" || $request->uri->getSegment(3) == "tampil_kecamatan" || $request->uri->getSegment(3) == "tampil_kelurahan") { ?>menu-is-opening menu-open<?php } ?>">

							<a href="#" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_users" || $request->uri->getSegment(3) == "tampil_level" || $request->uri->getSegment(3) == "tampil_kecamatan" || $request->uri->getSegment(3) == "tampil_kelurahan") { ?>active<?php } ?>">
								<i class="nav-icon fas fa-book"></i>
								<p>
									Master Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url() ?>/<?php echo $level ?>/Level/tampil_level" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_level") { ?>active<?php } ?>">
										<i class="far fa- nav-icon"></i>
										<p>Level</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>/<?php echo $level ?>/Users/tampil_users" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_users") { ?>active<?php } ?>">
										<i class="far fa- nav-icon"></i>
										<p>Users</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>/<?php echo $level ?>/Kelurahan/tampil_kelurahan" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_kelurahan") { ?>active<?php } ?>">
										<i class="far fa- nav-icon"></i>
										<p>Kelurahan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>/<?php echo $level ?>/Kecamatan/tampil_kecamatan" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_kecamatan") { ?>active<?php } ?>">
										<i class="far fa- nav-icon"></i>
										<p>Kecamatan</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item">
							<a href="<?php echo base_url() ?>/<?php echo $level ?>/Cctv/tampil_cctv" class="nav-link <?php if ($request->uri->getSegment(3) == "tampil_cctv" || $request->uri->getSegment(3) == "ubah_cctv") { ?>active<?php } ?>">
								<i class="nav-icon fas fa-video"></i>
								<p>
									Data CCTV
								</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo base_url() ?>/Logout" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>