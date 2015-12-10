<?php 
include "../model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");


$id = $_POST['id'];

$data = $crud -> fetch ("makanan", "no = '$id'");
	?>
	<div class="modal-header">
									     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									     <h4 class="modal-title" id="myModalLabel"><?= $data[0]['nama']; ?></h4>
									     </div>
									     <div class="modal-body">
								 		<div class="container">

										<form action="../nenek/rumah.php" method="post" enctype="multipart/form-data">

										<div class="col-sm-6">

										<label for="exampleInputEmail2">Nama Makanan</label>
										<input type="text" name="nama" class="form-control" value="<?= $data[0]['nama']; ?>" required >
										<br>
										<label for="exampleInputEmail2">Gambar</label>
										<input type="file" name="gambar" required>
										<img src="../nenek/tampilan/img/<?= $data[0]['gambar']; ?>" style="width:100px">
										<br>
										<label for="exampleInputEmail2">Harga Makanan</label>
										<input type="text" name="harga" class="form-control" value="<?= $data[0]['harga']; ?>" required >
										<input type="hidden" name="id" value="<?= $data[0]['no']; ?>" name="id">
										<br>
										 <div class="form-group">
						  	
									  <textarea class="form-control" rows="3" name="keterangan" placeholder="masukan Keterangan atau iklan"></textarea>
									  </div>
										<button type="submit" class="btn btn-success" name="btnedit">Edit</button>
										</div>

										   		
										</form>		

									</div>
								 	</div>
	<?php





 ?>