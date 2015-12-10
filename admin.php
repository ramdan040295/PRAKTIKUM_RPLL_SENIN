<?php
session_start();

if(empty(@$_SESSION['username'])){

	header('location:index.php');
}else{

}
 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no" >
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Form</title>

    <!-- Bootstrap -->
    <link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    <link href="tampilan/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .form-horizontal{
      padding: 50px;
    }
  
   
    </style>
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
		      	<li><a href="pemberitahuan.php?page=inpesanan" class="active"><b>Pemberitahuan</b></a></li>		

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

		    
			       	<ul class="nav nav-pills nav-justified">
					<li class="active"><a href="#datamakanan" data-toggle="tab">Data Makanan</a></li>
					<li><a href="#datapegawai" data-toggle="tab">Data Pegawai</a></li>
					<li><a href="#tambahmakanan" data-toggle="tab">Tambah Makanan</a></li>
					<li><a href="#tambahpegawai" data-toggle="tab">Tambah Pegawai</a></li>
				</ul>

	       		
	       		<!-- ini adalah tambah makanan -->
	       		<div class="tab-content">
		       		<div class="tab-pane fade in active" id="datamakanan">

		       		<?php 
		       			include "model/_crud.mysqli.oop.php";
						$crud =new CRUD("localhost","root","","restoran");
		       		 ?>
		       		  <hr>
		       		  <hr>

		       		  <div ="row">

		       		  	<table class="table table-striped">
		       		  	 	<thead>
								<tr>
									<th>No.</th>
									<th>Nama Makanan.</th>
									<th>Gambar Makanan</th>
									<th>Harga Makanan.</th>
									<th>Keterangan.</th>
								</tr>
							</thead>
				       		  	<?php 
								 $no = 1;
								 $row = $crud->fetch("makanan");

									 foreach ($row as $data) {
									 		?>
									 			
												<tr>
									       		  	<td><?php echo $no++;?></td>
									       		  	<td><?php echo $data['nama'];?></td>
									       		  	<td><img src="tampilan/img/<?php echo $data['gambar']; ?> " class="img-circle" alt="Responsive image" width="150px"></td>
									       		  	<td><?php echo $data['harga'];?></td>
									       		  	<td><?php echo $data['keterangan'];?></td>
									       		  	<td><a onclick="return confirm('apakah yakin data ini akan di hapus')" href="?page=hapus&no=<?php echo $data['no']; ?>"><span class="glyphicon glyphicon-remove">hapus</span></a></td>
									       			<!-- Button trigger modal -->
									       		    <input type="hidden" id="id-<?= $no ?>" value="<?= $data['no'] ?>">
									  				<td> <button onclick="setNo(<?= $data['no'] ?>)" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit">edit</span>
													  
													  </button></td>
													</tr>
									    			  <?php
								 							}
				       		  	 ?>   		  	 
									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel"></h4>
									      </div>
									      <div class="modal-body">
									      <div class="container">

									<form action="controler/edit_makanan.php" method="post" enctype="multipart/form-data">
										<div class="col-sm-6">
										<label for="exampleInputEmail2">Nama Makanan</label>
										<input type="text" name="nama" class="form-control" placeholder="" required >
										<br>
										<label for="exampleInputEmail2">Gambar</label>
										<input type="file" name="gambar" required>
										<br>
										<label for="exampleInputEmail2">Harga Makanan</label>
										<input type="text" name="harga" class="form-control" placeholder="" required >
										<input type="text" name="id" value="" name="id">
										<br>
										<button type="submit" class="btn btn-success" name="edit">Masukan</button>
										</div>
									</form>		
									</div>
								 </div>
							</table> 
			       		 </div>
			       		</div>
			       				<?php

								 	if(@$_GET['page'] == 'hapus'){
								 		$id = @$_GET['no'];
								 		echo "$id";
								 		$crud->delete("makanan","no = '$id'");
								 		
								 		
								 	}


			       				  ?>

			       		   		
		       		<div class="tab-pane fade" id="datapegawai">

		       			<table class="table table-striped">
		       				<thead>
		       					<tr>
		       						<th>No</th>
		       						<th>Nama </th>
		       						<th>Username</th>
		       						
		       						<th>alamat</th>
		       						<th>Telepon</th>
		       						<th>Jabatan</th>

		       					</tr>
		       				</thead>	
		       				<?php
		       					$no = 1;
		       					$row = $crud->fetch('pegawai');
		       					foreach ($row as $data) {
		       						?>
		       							<tr>
		       								<td><?php echo $no++;  ?></td>
		       								<td><?php echo $data['nama'];  ?></td>
		       								<td><?php echo $data['username'];  ?></td>
		       								
		       								<td><?php echo $data['alamat'];  ?></td>
		       								<td><?php echo $data['telepon'];  ?></td>
		       								<td><?php echo $data['jabatan'];  ?></td>

		       							</tr>
		       						<?php
		       					}
		       					?>
		       			</table>

		       		</div>
		       		<div class="tab-pane fade" id="tambahmakanan" >

		       			<form action="controler/tambah_makanan.php" method="post" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="exampleInputEmail2">Nama Makanan</label>
						    <input type="text" class="form-control" name="nama" placeholder="masukan nama makanan">
						  </div>
						   <div class="form-group">
						    <label for="exampleInputFile">Masukan Gambar</label>
						 
						    <input type="file" name="gambar">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword2">Harga</label>
						    <input type="text" class="form-control" name="harga" placeholder="masukan Harga">
						  </div>
						  <div class="form-group">
						  	
						  <textarea class="form-control" rows="3" name="keterangan" placeholder="masukan Keterangan atau iklan"></textarea>
						  </div>
						   <button type="submit" class="btn btn-success" name="btnsimpan">Masukan</button>
						</form>			
		       		</div>
		       		
		       		<!-- ini adalah tambah pegawai -->
		       		<div class="tab-pane fade" id="tambahpegawai">

		       			<form class="form-horizontal">
		       				<div class="form-group">
							    <label for="exampleInputEmail1">Nama </label>
							    <input type="text" class="form-control" name="nama" placeholder="masukan nama" require>
						  	</div>
						  	<div class="form-group">
							    <label for="exampleInputEmail1">Username</label>
							    <input type="text" class="form-control" name="username" placeholder="masukan username" require>
						  	</div>
						  	<div class="form-group">
							    <label for="exampleInputEmail1">Password</label>
							    <input type="text" class="form-control" name="password" placeholder="masukan password" require>
						  	</div>
						  	<div class="form-group">
							    <label for="exampleInputEmail1">Alamat</label>
							    <input type="text" class="form-control" name="alamat" placeholder="masukan alamat" require>
						  	</div>
						  		<div class="form-group">
							    <label for="exampleInputEmail1">Telepon</label>
							    <input type="text" class="form-control" name="telepon" placeholder="telepon " require>
						  	</div>
						  		<div class="form-group">
							    <label for="exampleInputEmail1">Jabatan</label>
							    <input type="text" class="form-control" name="jabatan" placeholder="masukan jabatan" require>
						  	</div>
						  	<div class="form-group">
							    <button class="btn btn-primary" name="btnsimpan">Simpan</button>
						  	</div>
		       			</form>
		       		</div>
       			</div>
       		</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="tampilan/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script type="text/javascript">
     function setNo (id) {
     	var idx= id;
     	//alert(id);
     	//$("#myModalLabel").html(id);
     	$.ajax({
     		type : 'POST',
     		url : 'controler/get_data.php',
     		data   : 'id='+idx,
     		success : function(msg){
     		//	alert(msg);
     			$(".modal-content").html(msg);
     		}

     	});
     }
    </script>
  </body>
</html>
