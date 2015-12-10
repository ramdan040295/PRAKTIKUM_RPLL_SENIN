<?php

session_start();

if(@$_SESSION['nomor_meja']){

	header('location:menu.php');
}else{

  ?>

<?php

if(@$_SESSION['username']){

	header('location:admin.php');
}else{

  ?>

<!DOCTYPE HTML>
<html> 
	<head>
		<title>SOENDA RESTO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="tampilan/css/bootstrap.min.css" rel="stylesheet">
    	<link href="tampilan/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="awal/css/cssku.css" />
		
	</head>
	<body class="gravloading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
				<header id="header">
						<h1>SOENDA RESTO</h1>
						<p>Nikmati &nbsp;&bull;&nbsp; Makanan &nbsp;&bull;&nbsp; Nusantara </p>
						<nav>
							<ul>
								
								<li><a href="#" class="icon fa-twitter" data-toggle="modal" data-target=".bs-example-modal-sm"><img src="awal/img/menu.png" height="50px"></a></li>
								<li><a href="#" class="icon fa-twitter"><img src="awal/img/twt.png" height="50px"></a></li>
								<li><a href="#" class="icon fa-twitter"><img src="img-icon/facebook-icon.png" height="50px"></a></li>
								<li><a href="#" class="icon fa-twitter" data-toggle="modal" data-target="#myModal"><img src="awal/img/login2.png" height="50px"></a></li>
							</ul>
						</nav>
					</header>

      			</div>

    			</div>

			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-sm">
		  
    <div class="modal-content">
					      <div class="modal-header">
					       <h1><b>Masukan Nomor Meja Anda</b></h1>
					       <hr>

					          <form class="form-horizontal " method="post" action="get_session_menu.php">
					          
					          <select class="form-control" name="mm" value="masukan No.Meja">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
										</select>
					          <div class="form-group">
					     </div>
					          <div class="form-group">
					            <div class="col-sm-offset-2 col-sm-6">
					              <button type="submit" name="meja" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-ok"></span>Masuk</button>
					            </div>
					          </div></div>
					        </form>
					       </div>
					      </div>

					  </div>

					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Silahkan Login</h4>
					      
					     	<hr>
					          <form class="form-horizontal" method="post" action="control_login.php">
					          <div class="form-group">
					            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					            <div class="col-sm-6">
					              <input type="text" class="form-control" name="username" id="inputEmail3" placeholder="Masukan username disini">
					            </div>
					          </div>
					          <div class="form-group">
					            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					            <div class="col-sm-6">
					              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Masukan Password Disini">
					            </div>
					          </div>
					          <div class="form-group">
					            <div class="col-sm-offset-2 col-sm-6">
					              <div class="checkbox">
					                <label>
					                  <input type="checkbox"> Remember me
					                </label>
					              </div>
					            </div>
					          </div>
					          <div class="form-group">
					            <div class="col-sm-offset-2 col-sm-6">
					              <button type="submit" name="login" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>  Sign in</button>
					            </div>
					          </div></div>
					        </form>
					       </div>
					      </div>

					  </div>



				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy; Gravitasi<a href="http://html5up.net"></a>.</span>
					</footer>

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		 <script src="tampilan/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="tampilan/js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
}
 ?>

<?php

}


  ?>