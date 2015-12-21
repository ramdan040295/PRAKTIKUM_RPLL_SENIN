<?php
$p_harga = @$_POST['harga'];
$p_nominal = @$_POST['pembayaran'];
$p_nome = @$_POST['no_me'];
$p_kembali = $p_nominal - $p_harga;



$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("restoran");

$sql = mysql_query("INSERT INTO final_pesan VALUES('',$p_nome,$p_nominal,$p_harga,$p_kembali,NOW());");
$sql = mysql_query("INSERT INTO laporan VALUES('',$p_nome,$p_nominal,$p_harga,$p_kembali,NOW());");

header('location:menu_2.php')
?>

