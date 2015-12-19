<?php
$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("restoran");

$username = @$_POST['username'];
$password = md5(@$_POST['password']);

$sql = mysql_query("SELECT * FROM pegawai WHERE username = '$username'");
$data = mysql_fetch_array($sql);
$cek = mysql_num_rows($sql);

$sql2 = mysql_query("SELECT * FROM pegawai WHERE password = '$password'");
$data2 = mysql_fetch_array($sql2);
$cek2 = mysql_num_rows($sql2);

if(($cek > 0 )&&($cek2 > 0)){
		session_start();
		@$_SESSION['username'] = $data['username'];

		header('location:admin.php');

}else{
	header('location:index.php');
}
?>
