<?php 
include "model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("restoran");

$nmor_meja = @$_POST['mm'];

$sql = mysql_query("SELECT * FROM meja where tmpmeja='$nmor_meja'");
$data = mysql_fetch_array($sql);
$cek = mysql_num_rows($sql);


if($cek > 0){
	
	header('location:index.php');


}else{
		session_start();
		@$_SESSION['nomor_meja'] = $nmor_meja;
			$data = array('no'=>'','tmpmeja'=>$nmor_meja);
			$crud->insert('meja',$data);
		header('location:menu.php');
}
		


 ?>

