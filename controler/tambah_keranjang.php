<?php 
include "../model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");

$no = @$_POST['id'];
$nama = @$_POST['nama'];
$gambar = @$_FILES['gambar']['tmp_name'];
$banyak = @$_POST['banyak'];
$harga = @$_POST['harga'];
$nama_gambar = @$_FILES['gambar']['name'];
$jumlah=$harga*$banyak;
$mmeja = @$_POST['meja'];

	$data = array('meja'=>$mmeja,'nama'=>$nama,'noo'=>'','banyak'=>$banyak,'harga'=>$harga,'total'=>$jumlah);
	$crud->insert('keranjang',$data);
		header('location:../menu.php');
 ?>
