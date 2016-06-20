<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
 <title>Web App Sederhana</title>
</head>
<body>
 <form action="hello.php" method="POST">
  <div>
   <label for="nama">Nama</label>
   <input type="text" id="nama" name="nama"/>
  </div>
  <div>
   <label for="email">Email</label>
   <input type="email" id="email" name="email"/>
  </div>
  <div>
   <input type="submit" id="submit" name="submit"/>
  </div>
 </form>
</body>
=======
<?php
//header('Refresh: 5; URL=http://localhost/monitoring/'); 
	include("connection.php"); 	
	$result=mysql_query("SELECT * FROM `pemantauan` ORDER BY `id` DESC");
	$result1=mysql_query("SELECT * FROM `pemantauan`  ORDER BY `id` DESC LIMIT 1");
	$kolam=mysql_query("SELECT * FROM `kolam` ORDER BY `kolam` DESC");
	$kolam1=mysql_query("SELECT * FROM `kolam` where kolam=1");
	$kolam2=mysql_query("SELECT * FROM `kolam` where kolam=2");
?>
<html>
	<head>
		<title>Monitoring Suhu Realtime</title>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="./css/bootstrap.css">
	</head>
	<body OnLoad="document.login.username.focus();" style="background:url(background.png); background-attachment:fixed">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<center>
				  <h3 style="text-align:right;" class="hijau tebel">Sistem Monitoring Suhu <em>Realtime</em></h3></center>
			</div>
			<div class="col-md-2">
				&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<center>
				  <h5 style="text-align:right;" >Program Studi Teknik Informatika Fakultas Teknik UMRAH</h5></center>
				<hr style="margin-top: 0px; margin-bottom:0px">
			</div>
			<div class="col-md-2">
				&nbsp;
			</div>
		</div>
		<br>
		<?php 
			if($result1!==FALSE){
				$ndata=mysql_num_rows($result);
			    while($lastrow = mysql_fetch_array($result1)) {
			    	$last_kolam1=$lastrow["kolam1"];
			    	$last_kolam2=$lastrow["kolam2"];
			    	$last_update=$lastrow["tanggal"];
					$last_time=$lastrow["jam"];
			    }
			}
				//mysql_free_result($result2);
			//mysql_close();
		?>

        <?php 
			if($kolam1!==FALSE){
				$nkolam=mysql_num_rows($kolam);
			    while($dkolam = mysql_fetch_array($kolam1)) {
			    	$ikan1=$dkolam["jenis_ikan"];
			    	$suhu_min1=$dkolam["suhu_minimum"];
					$suhu_maks1=$dkolam["suhu_maksimum"];
			    	$kedalaman1=$dkolam["kedalaman"];
					$panjang1=$dkolam["panjang"];
					$lebar1=$dkolam["lebar"];
			    }
			}
				//mysql_free_result($result2);
			//mysql_close();
		?>
        <?php 
			if($kolam2!==FALSE){
				$nkolam2=mysql_num_rows($kolam);
			    while($dkolam2 = mysql_fetch_array($kolam2)) {
			    	$ikan2=$dkolam2["jenis_ikan"];
			    	$suhu_min2=$dkolam2["suhu_minimum"];
					$suhu_maks2=$dkolam2["suhu_maksimum"];
			    	$kedalaman2=$dkolam2["kedalaman"];
					$panjang2=$dkolam2["panjang"];
					$lebar2=$dkolam2["lebar"];
			    }
			}
				//mysql_free_result($result2);
			//mysql_close();
		?>

		<div class="row">
			<div class="col-md-2 col-md-offset-2">
				<div class="panel panel-primary">
  					<div class="panel-heading">
    					<h3 class="panel-title tengah">Navigasi</h3>
  					</div>
  					<div class="panel-body" style="padding:0px;">
    					<table class="table table-stripped table-hover" >
							<tbody>
								<tr class="info">
									<td><span class="glyphicon glyphicon-home"></span><a href="./index.php" style="text-decoration:none;"> Home</a></td>
								</tr>
                                
								<tr>
									<td><span class="glyphicon glyphicon-th-list"></span><a href="./tables.php" style="text-decoration:none;"> Tabel</a></td>
								</tr>
                                <!--
								<tr>
									<td><span class="glyphicon glyphicon-stats"></span><a href="./stats.php" style="text-decoration:none;"> Statistik</td>
								</tr> -->
							</tbody>
						</table>
  					</div>
                    <p></p>
                    
                    <div class="panel-heading">
    					<h3 class="panel-title kiri">Last Update</h3>
  					</div>
  					<div class="panel-body" style="padding:0px;">
    					<table class="table table-stripped table-hover" >
							<tbody>
								<tr class="info">
									<td><?php echo $last_update?> || <?php echo $last_time?></td>
								</tr>
							</tbody>
						</table>
  					</div>
                    <div class="panel-heading">
    					<h3 class="panel-title kiri">Interval Update</h3>
  					</div>
  					<div class="panel-body" style="padding:0px;">
    					<table class="table table-stripped table-hover" >
							<tbody>
								<tr class="info">
									<td>5 Seconds</td>
								</tr>
							</tbody>
						</table>
  					</div>
				</div>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center>
						  <p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Suhu Kolam 1</p></center></td>
					</thead>
					<tr class="success">
						
						<td><center><?php 
						if ($last_kolam1 >= $suhu_min1 && $last_kolam1 <= $suhu_maks1) {
						?> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam1";?>&degC </p> Suhu Normal <?php }  else if ($last_kolam1 > $suhu_min1) {
						?> <font color="red"> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam1";?>&degC </p> WARNING! SUHU DIATAS MAKSIMUM <?php } else if ($last_kolam1 < $suhu_min1) {
						?> <font color="blue"> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam1";?>&degC </p>  WARNING! SUHU DIBAWAH MINIMUM <?php } ?></center></td>
					</tr>
                    <tr>
                    	<td><p class="tebel">Informasi Kolam:</p>
					<table class="table table-striped table-hover">
						<tr>
							<td>Jenis Ikan</td>
							<td>:</td>
							<td><?php echo $ikan1?></td>
						</tr>
                        
						<tr>
							<td>Suhu Minimum</td>
							<td>:</td>
							<td><?php echo $suhu_min1?> &degC </td>
						</tr>
						<tr>
							<td>Suhu Maksimum</td>
							<td>:</td>
							<td><?php echo $suhu_maks1?> &degC </td>
						</tr>
                        <tr>
							<td>Kedalaman</td>
							<td>:</td>
							<td><?php echo $kedalaman1?> cm</td>
						</tr>
                        
						<tr>
							<td>Panjang</td>
							<td>:</td>
							<td><?php echo $panjang1?> cm</td>
						</tr>
						<tr>
							<td>Lebar</td>
							<td>:</td>
							<td><?php echo $lebar1?> cm</td>
						</tr>
					</table>
                        </td>
                    </tr>
				</table>
			</div>
			<div class="col-md-3">
				<table class="table table-bordered">
					<thead>
						<td><center><p class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px"><span class="tebel" style="margin-top:0px; margin-bottom:0px; font-size:18px">Suhu Kolam 2 </span></p>
						</center></td>
					</thead>
					<tr class="info">
						<td><center><?php 
						if ($last_kolam2 >= $suhu_min2 && $last_kolam2 <= $suhu_maks2) {
						?> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam2";?>&degC </p> Suhu Normal <?php }  else if ($last_kolam2 > $suhu_min2) {
						?> <font color="red"> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam2";?>&degC </p> WARNING! SUHU DIATAS MAKSIMUM <?php } else if ($last_kolam2 < $suhu_min2) {
						?> <font color="blue"> <p class="tebel gede" style="margin-top:5px"><?php echo "$last_kolam2";?>&degC </p> WARNING! SUHU DIBAWAH MINIMUM <?php } ?></center></td>
					</tr>
                                        <tr>
                    	<td><p class="tebel">Informasi Kolam:</p>
					<table class="table table-striped table-hover">
						<tr>
							<td>Jenis Ikan</td>
							<td>:</td>
							<td><?php echo $ikan2?></td>
						</tr>
                        
						<tr>
							<td>Suhu Minimum</td>
							<td>:</td>
							<td><?php echo $suhu_min2?> &degC </td>
						</tr>
						<tr>
							<td>Suhu Maksimum</td>
							<td>:</td>
							<td><?php echo $suhu_maks2?> &degC </td>
						</tr>
                        <tr>
							<td>Kedalaman</td>
							<td>:</td>
							<td><?php echo $kedalaman2?> cm</td>
						</tr>
                        
						<tr>
							<td>Panjang</td>
							<td>:</td>
							<td><?php echo $panjang2?> cm</td>
						</tr>
						<tr>
							<td>Lebar</td>
							<td>:</td>
							<td><?php echo $lebar2?> cm</td>
						</tr>
					</table>
                        </td>
                    </tr>
				</table>
			</div>
		</div>
    </div>
	</body>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/modules/data.js"></script>
	<script type="text/javascript" src="./js/modules/exporting.js"></script>
	<script type="text/javascript" src="./js/highcharts.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script>
	
>>>>>>> 6ad85191a41023672f979d3329b2b4e0502b3624
</html>
