<?php 
include "../model/_crud.mysqli.oop.php";
$crud = new CRUD("localhost","root","","restoran");


$nama = @$_POST['nama'];
$username = @$_POST['username'];
$password = @$_POST['password'];
$alamat = @$_POST['alamat'];
$telepon = @$_POST['telepon'];
$jabatan = @$_POST['jabatan'];


$data = array('nama'=>$nama,'username'=>$username,'password'=>$password,'alamat'=>$alamat,'telepon'=>$telepon,'jabatan'=>$jabatan);
$crud->insert('pegawai',$data);
	header('location:..admin.php');

 ?>