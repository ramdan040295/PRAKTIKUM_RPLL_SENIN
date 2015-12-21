<?php
session_start();

if(@$_SESSION['nomor_meja']){
	$pkmeja = @$_SESSION['nomor_meja'];
 ?>
<?php
include "model/_crud.mysqli.oop.php";
$crud = new CRUD("localhost","root","","restoran");
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
	
		<title>Restoran emak</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/main.css" />
		 <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    	<link href="tampilan/css/bootstrap.css" rel="stylesheet">
	
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
		.modal-content2{
			background-color: #FFFFFF;
			}</style>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">

		<!-- Main -->
		<div id="main">
				<!-- Header -->
				
					<div class="panel panel-default">
					<nav class="navbar navbar-inverse">
  
          <ul class="nav navbar-nav">
            <li class="active"><a href="menu.php">Pesan Makanan Baru</a></li>
         
          </ul>
        
</nav>
					  <div class="panel-heading">
					  	<form action="logout_meja.php" method="POST">
					  		<input type="hidden" name="inimeja" value="<?php echo "$pkmeja"; ?>">
					  		<button class="btn btn-default" type="submit"><center><img src="img-icon/logo.png" width="100px"></center></button>
					 	</form>
					  </div>
					  <div class="panel-body">
					    <table class="table">
		       				<thead>
		       					<tr>
		       						<th><?php 
		       						echo $pkmeja;
		       						 ?></th>
		       						<th>Nama</th>
		       						<th>Harga</th>
		       						<th>Qty</th>
		       						<th>bill</th>
		       						<th>opt</th>
		       					</tr>
		       				</thead>	
		       				<?php
		       				$total_bil =0;
		       					$no = 1;
		       					$pkmeja;
	       					$row = $crud->fetch("keranjang", "meja = '$pkmeja'");
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								<td><?php echo $no++; ?></td>
		       								<td><?php echo $data['nama']; ?></td>
		       								<td><?php echo $data['harga']; ?></td>
		       								<td><?php echo $data['banyak']; ?></td>
		       								<td><?php echo $data['total']; ?></td>
											<td>
											<span class=" glyphicon glyphicon-ok"></span>
											</td>
		       							</tr>
		       						<?php
		       						$total_bil = $total_bil + $data['total'];
		       						}
		       					?>

		       			</table>
		       			<table>
		       				<tr>
		       					<td></td>
		       					<td></td>
		       					<td><b><h4>Tunggulah Beberapa Menit...Makanan Sedang Diantarkan</h4></b></td>
		       				</tr><tr>
		       					<td></td>
		       					<td></td>
		       					<td><b><h2> Rp.  <?php echo $total_bil; ?></h2></b></td>
		       				</tr>
		       			</table>
		       			<?php

								 	if(@$_GET['page'] == 'hapus'){
								 		$id = @$_GET['no'];
								 		
								 		$crud->delete("keranjang","noo= '$id'");
								 		header('location:index.php');
								 		
								 	}
			       				  ?>
			       				  
	
			 </div>
		</div>
			<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
						<div class="modal-dialog modal-sm">
						 <?php echo $pkmeja; ?>
						 <div class="modal-content">
				<form method="POST" action="pembayaran.php">
						 	
						 <h3>
						   <?php echo "TOTAL  Rp. $total_bil"; ?>
						 </h3>
						 <div class="col-sm-10">
						 <input type="hidden" name="no_me" value="<?php echo $pkmeja;  ?>">
						 <input type="hidden" name="harga" value="<?php echo $total_bil; ?>">
						 <input type="text" name="pembayaran" placeholder="Masukan Nominal Yang Akan Anda Bayarkan" required>
						 </div>
						 <hr>
						<button type="submit" class="btn btn-success" name="btnbayar">Bayar</button>
					
						<p>terimakasih telah mengunjungi dan berbelanja di Soenda Resto, tunggulah 5 menit setelah menekan tombol Bayar dibawah!  pesanan anda akan segera datang</p>
				</form>
						 </div></div>
					</div>	

					</header>
					<!--data makanan php -->
				
				<!-- Thumbnail -->
	
					<section id="thumbnails">
					<?php 
					$no =1;
					$row = $crud->fetch("makanan");
					foreach ($row as $data) {
					 ?>
	<article>
	
		<h2><?php echo $data['harga']; ?></h2>
		<p><h2><?php echo $data['nama']; ?></h2></p>
		<p><?php echo $data['keterangan']; ?></p>
		<a class="thumbnail" href="tampilan/img/<?php echo $data['gambar']; ?>" data-position="left center">
		<img src="tampilan/img/<?php echo $data['gambar']; ?>" alt="" /></a>
		<input type="hidden" id="id-<?= $no ?>" value="<?= $data['no'] ?>">
		
	</article>
			<?php  
			}
			if(@$_GET['page'] == 'pilih')
									{
					 		$no = @$_GET['no'];
					 		echo "$no";
								 		?>
							<?php
								 	}
					 		
			?>
					</section>
					</div>
				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Gravitasi.</li><li>Design: <a href="#">muhamad ramdan</a></li>
						</ul>
					</footer>
					
			</div>
			    	
				

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="tampilan/js/bootstrap.min.js"></script>
     <script src="tampilan/js/jquery.min.js"></script>

     
	</body>
</html>

<?php 
	
}else{
header('location:index.php');
}
 ?>