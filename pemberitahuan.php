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
		      	<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberitahuan<span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li role="separator" class="divider"></li>
		            <li><a href="?page=inmeja">Informasi Meja</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="?page=inpesanan">Pesanan</a></li>
		            
		            <li role="separator" class="divider"></li>
		          </ul>
		        </li>
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
		  	 	<div class="panel">
		  	 		
		  	 	<?php 
		  	 if(@$_GET['page'] == 'inmeja'){
		  	 	echo "ini adalah informasi meja";
		  	 }	elseif (@$_GET['page'] == 'inpesanan') {
		  	 	echo "ini adalah pesanan";
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
