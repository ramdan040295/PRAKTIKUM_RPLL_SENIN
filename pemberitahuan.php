
<?php


if(@$_SESSION['nomor_meja']){

	header('location:menu.php');

}else{

  ?>


<?php



include "model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");
?>

 <!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="refresh" content="5">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no" >
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Form</title>

    <!-- Bootstrap -->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <link href="tampilan/css/bootstrap.css" rel="stylesheet">

  </head>
  <body>


 <nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php"><img src="img-icon/logo.png" width="80px;"></a>
		    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
      <form class="navbar-form navbar-right" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Cari">
		        </div>
		        <button type="submit" class="btn btn-default">Cari</button>
      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="menu.php" class="active">Menu Makanan</a>
		        </li>
		        <li><a href="logout.php" class="active"><b>Log Out</b></a></li>		
		      	<li><a href="pemberitahuan.php" class="active"><span class="badge"></span>Pemberitahuan</a></li>
		       </ul>
		    </div><!-- /.navbar-collapse -->

		  </div><!-- /.container-fluid -->
		</nav>

			<div class="container">
				<div class="panel panel-default">
				   	<div class="page-header">
		  				<h1><center>Sunda Resto<small> Admin form </small></center></h1>
					</div>
		  	 	</div>

		  	 	<div class="row">
  <div class="col-md-8"><h2><center><b>INFORMASI PESANAN</b></center></h2>
  <hr>
  		  	 		<div class="table table-bordered">
					  <table class="table">
					    <tr><b>					    	
					    	<th>Meja No. </th>
		       				<th>Uang Pembayaran</th>
		       				<th>Jumlah Bill </th>
		       				<th>Kembali </th>
		       				<th>Waktu Pesanan </th>	
		       				<th>Konfirmasi </th>		
		       			</tr>
					    	</b>
		       					<?php

		       					$row = $crud->fetch_order('final_pesan', 'final_meja');
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								
		       								
		       <td><b><?php echo $data['final_meja'];  ?></b></td>
		       <td>Rp. <?php echo $data['final_bayar'];  ?></td>
		       <td>Rp. <?php echo $data['final_bill'];  ?></td>
		       <td><b><h3>Rp. <?php echo $data['final_kembali'];  ?></h3></b></td>
		       <td><?php echo $data['final_waktu'];  ?></td>
		       							
		       <td><a href="?page=konfirmasi&nome=<?php echo $data['final_meja']; ?>"><span class="glyphicon glyphicon-tags"> Konfirmasi</span></a></td>
		       <td><a href="?page=hapuss&nome=<?php echo $data['final_meja']; ?>"><span class="glyphicon glyphicon-tags"> Hapus</span></a></td>
		       
		     

									  
	</button></td><!-- Button trigger modal -->

		       							</tr>
		       						<?php
		       						
		       					}
		       					?>
					  </table>


  </div>
  </div>


  <div class="col-md-4"><h2><center><b>INFORMASI MEJA</b></center></h2>
  <hr>
  		  	 		<div class="table table-bordered">
					  <table class="table">
					    <tr>
		       						<th><center>No</th></center>
		       						<th><center>Tempat</center> </th>
		       						<th><center>Option</center></th>
		       						
		       				</tr>
		       					<?php

		       					$no = 1;
		       					$row = $crud->fetch('meja');
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								<td><center><?php echo $no++;  ?></center></td>
		       								<td><center><b><?php echo $data['tmpmeja'];  ?></b></center></td>
		       								<td><center><a href="?page=hapus&no=<?php echo $data['no'];  ?>"><span class="glyphicon glyphicon-refresh">Clear</span></a></center></td>
		       								
		       							</tr>
		       						<?php
		       					}
		       					?>
					  </table>
		       			<?php
		       			 	if(@$_GET['page'] == 'hapus'){
							$d = @$_GET['no'];
							$crud->delete("meja","no='$d'");
							header('location:pemberitahuan.php');
							}
						?>
  </div>
</div>	

 	<div class="row">
  <div class="col-md-8">
  <hr>
  <div class="panel">
		  	 	 <?php 
					  $ambil_meja = @$_GET['page'];
					  $no_meja = @$_GET['nome'];

		if($ambil_meja == 'konfirmasi'){

					  		?>
<h2><center><b>KONFIRMASI PESANAN</b></center></h2>
					<div class="table table-bordered">
					  <table class="table">
					    <tr>
					    	<th class="warning">Meja No. </th>
		       				<th class="warning">Nama Makanan</th>
		       				<th class="warning">Harga </th>
		       				<th class="warning">Banyak </th>
		       				<th class="warning">Total </th>	
		       					
		       			</tr>
		       					<?php
		       					$bil = 0;
		       					$row = $crud->fetch("detail_penjualan", "nomor_meja='$no_meja'");
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								
		       								<td class="success"><?php echo $data['nomor_meja'];  ?></td>
		       								<td class="success"><?php echo $data['nama'];  ?></td>
		       								<td class="success"><?php echo $data['harga'];  ?></td>
		       								<td class="success"><?php echo $data['banyak'];  ?></td>
		       								<td class="success"><?php echo $data['total'];  ?></td>
		       							</tr>
		       						<?php
		       						$bil = $bil + $data['total']; 

		       					}

		       					$row = $crud->fetch("final_pesan", "final_meja='$no_meja'");
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								<td><?php $i=$data['final_bayar'];  ?></td>
		       								
		       							</tr>
		       						<?php
		       					}
		       						$kem =  $i - $bil;
		       					?>
		       					<tr>
								<td></td>
		       					<td></td>
		       					<td></td>
		       					<td><b>Total Semua</b></td>
		       					<td><b>Rp. <?php echo $bil; ?></b></td>
		       					</tr>
		       					<tr>
		       					<td></td>
		       					<td></td>
		       					<td></td>
		       					<td><b>Dibayar</b></td>
		       					<td><b>Rp. <?php echo $i; ?></b></td>
		       					</tr>
		       					<tr>
		       					<td></td>
		       					<td></td>
		       					<td></td>
		       					<td><b>Kembali</b></td>
		       					<td><b>Rp. <?php echo $kem; ?></b></td>
		       					</tr>
					  </table>
					  </div>
					  <form method="POST" action="laporan/struk.php">
					  	<input type="hidden" name="dibayar" value="<?php echo $i; ?>">
					  	<input type="hidden" name="meja" value="<?php echo $no_meja; ?>">
					  	<input type="hidden" name="total" value="<?php echo $bil; ?>">
					  	<input type="hidden" name="kembali" value="<?php echo $kem; ?>">
					  	<hr>
		       			<center><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Cetak</button></center>
					  	</form>
					  		<?php
					  }elseif ($ambil_meja == 'hapuss') {

					  	$crud->delete("final_pesan","final_meja = '$no_meja'");
					  	$crud->delete("keranjang","meja= '$no_meja'");
					  	
					  }
					  ?>
					 
		</div>  
		  	 	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="tampilan/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="tampilan/js/bootstrap.min.js"></script>

   
  </body>
</html>
<?php 

}
 ?>