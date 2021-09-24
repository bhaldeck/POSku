<section class="content-header">
	<h1>
		Dashboard
		<small>Control Panel</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
 <!-- Menampilkan Jam (Aktif) -->
 <div id="clock"></div>
 <script type="text/javascript">
	function showTime() {
		var a_p = "";
		var today = new Date();
		var curr_hour = today.getHours();
		var curr_minute = today.getMinutes();
		var curr_second = today.getSeconds();
		if (curr_hour < 12) {
			a_p = "AM";
		} else {
			a_p = "PM";
		}
		if (curr_hour == 0) {
			curr_hour = 12;
		}
		if (curr_hour > 12) {
			curr_hour = curr_hour - 12;
		}
		curr_hour = checkTime(curr_hour);
		curr_minute = checkTime(curr_minute);
		curr_second = checkTime(curr_second);
		document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
	}
	
	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}
	setInterval(showTime, 500);
 //-->
 </script>
 
 <!-- Menampilkan Hari, Bulan dan Tahun -->
 <script type='text/javascript'>
	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth();
	var thisDay = date.getDay(),
		thisDay = myDays[thisDay];
	var yy = date.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
	document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
 </script>
 <br><br>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Barang</span>
				<span class="info-box-number"><?= $this->fungsi->count_barang() ?></span>
			</div>
			<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-truck "></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Supplier</span>
				<span class="info-box-number"><?= $this->fungsi->count_supplier() ?></span>
			</div>
			<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">User</span>
				<span class="info-box-number"><?= $this->fungsi->count_user()?></span>
			</div>
			<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Pelanggan</span>
				<span class="info-box-number"><?= $this->fungsi->count_pelanggan() ?></span>
			</div>
			<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	
</section>