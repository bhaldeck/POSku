<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Blank Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
	<!-- jQuery 3 -->
	<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-yellow sidebar-mini <?=$this->uri->segment(1) == 'penjualan' ? 'sidebar-collapse' : null ?>">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?=base_url('dashboard')?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b>P</b>ku</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<b>POS</b>ku</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Tasks: style can be found in dropdown.less -->
						<li class="dropdown tasks-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-flag-o"></i>
								<span class="label label-danger">9</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 9 tasks</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li>
											<!-- Task item -->
											<a href="#">
												<h3>
													Design some buttons
													<small class="pull-right">20%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">20% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all tasks</a>
								</li>
							</ul>
						</li>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image">
								<span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username)?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle"
									 alt="User Image">

									<p>
										<?=$this->fungsi->user_login()->nama?>
										<small><?=$this->fungsi->user_login()->alamat?></small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?=site_url('auth/logout')?>" class="btn  btn-flat bg-danger">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle"
						 alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?=ucfirst(	$this->fungsi->user_login()->username)?></p>
						<a href="#">
							<i class="fa fa-circle text-success"></i> Online
						</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : "" ?>>
						<a href="<?=site_url('dashboard')?>">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<?php if($this->fungsi->user_login()->level_id == 1) { ?>
					<li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : "" ?>>
						<a href="<?=site_url('supplier')?>">
							<i class="fa fa-truck"></i>
							<span>Supplier</span>
						</a>
					</li>
					<?php } ?>
					<li <?= $this->uri->segment(1) == 'pelanggan' ? 'class="active"' : "" ?>>
						<a href="<?=site_url('pelanggan')?>">
							<i class="fa fa-users"></i>
							<span>Pelanggan</span>
						</a>
					</li>
					<li class="treeview <?= $this->uri->segment(1) == 'kategori'
						 || $this->uri->segment(1) == 'satuan'
						 || $this->uri->segment(1) == 'barang' ? 'active' : "" ?>"  >
						<a href="#">
							<i class="fa fa-archive"></i>
							<span>Produk</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?= $this->uri->segment(1) == 'kategori' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('kategori')?>">
									<i class="fa fa-circle-o"></i> Kategori</a>
							</li>
							<li <?= $this->uri->segment(1) == 'satuan' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('satuan')?>">
									<i class="fa fa-circle-o"></i> Satuan</a>
							</li>
							<li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('barang')?>">
									<i class="fa fa-circle-o"></i> Barang</a>
							</li>
						</ul>
					</li>
					<li class="treeview <?= $this->uri->segment(1) == 'penjualan'
						 || $this->uri->segment(1) == 'stok' ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-shopping-cart"></i>
							<span>Transaksi</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?= $this->uri->segment(1) == 'penjualan' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('penjualan')?>">
									<i class="fa fa-circle-o"></i> Penjualan</a>
							</li>
							<li <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == 'in' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('stok/in')?>">
									<i class="fa fa-circle-o"></i> Stok Barang Masuk</a>
							</li>
							<li <?= $this->uri->segment(1) == 'stok' && $this->uri->segment(2) == 'out' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('stok/out')?>">
									<i class="fa fa-circle-o"></i> Stok Barang Keluar</a>
							</li>
						</ul>
					</li>
					<li class="treeview <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
						<a href="#">
							<i class="fa fa-pie-chart"></i>
							<span>Laporan</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'penjualan' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('laporan/penjualan')?>"><i class="fa fa-circle-o"></i> Sales</a>
							</li>
							<li <?= $this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'stok' ? 'class="active"' : "" ?>>
								<a href="<?=site_url('laporan/stok')?>"><i class="fa fa-circle-o"></i> Stocks</a>
							</li>
						</ul>
					</li>
					<?php if($this->fungsi->user_login()->level_id == 1) { ?>
					<li class="header">PENGATURAN</li>
					<li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : "" ?>>
						<a href="<?=site_url('user')?>"><i class="fa fa-user"></i><span>User</span></a>
					</li>
					<?php } ?>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<?= $contents ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0.0
			</div>
			<strong>Copyright &copy; 2020
				<a href="#">Toko Udin</a>.</strong> All rights reserved.
		</footer>

	</div>
	<!-- ./wrapper -->

	
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?=base_url()?>assets/dist/js/demo.js"></script> -->
	<!-- page script -->
	<script>
	$(document).ready(function () {
		$('#tabel1').DataTable()
		$('#tabel2').DataTable({
		'paging'      : true,
		'lengthChange': false,
		'searching'   : false,
		'ordering'    : true,
		'info'        : true,
		'autoWidth'   : false
		})
	})
	</script>

</body>

</html>