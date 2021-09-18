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
	dashboard page
	
</section>