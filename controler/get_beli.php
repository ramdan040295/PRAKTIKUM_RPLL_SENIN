<?php
session_start();

if(@$_SESSION['nomor_meja']){
	$pkmeja = @$_SESSION['nomor_meja'];
 ?>
<?php

include "../model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");


$id = $_POST['id'];

$data = $crud -> fetch ("makanan", "no = '$id'");
	?>
	<div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel"><b>Makanan Yang Akan Dibeli</b></h4>
									      </div>
									      <div class="modal-body">

									  
		 	
								 		<div class="container">

										<form action="../nenek/controler/tambah_keranjang.php" method="post" enctype="multipart/form-data">

										<div class="col-sm-1">
										<img src="../nenek/tampilan/img/<?= $data[0]['gambar']; ?>" alt="asdsadas" class="img-circle" width="200px">
										<input type="hidden" name="nama" class="form-control" value="<?= $data[0]['nama']; ?>"  >
										<input type="hidden" name="banyak" class="form-control">
										<input type="hidden" name="meja" class="form-control" value="<?= $pkmeja ?>">
										<input type="hidden" name="harga" value="<?= $data[0]['harga']; ?>">
										<input type="hidden" name="stok" value="<?=$n = $data[0]['stok']; ?>">
										<input type="hidden" name="id" value="<?= $data[0]['no']; ?>" name="id">
										<br>Banyak Porsi
										
										<select class="form-control" name="banyak">
										 <?php 
					          	$banyak_meja = 30;
					          	for ($i=0; $i <$n ; $i++) { 
					          		?>
					          			<option><?php echo $i; ?></option>
					          		<?php
					          	}

					            ?>
										</select>
										<br>
										<button type="submit" class="btn btn-success" name="btnedit">Beli</button>
										</div>

										   		
										</form>		

									</div>
								 	</div>
	<?php




}
 ?>