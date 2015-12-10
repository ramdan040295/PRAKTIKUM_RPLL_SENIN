<?php 
include "model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");

$keterangan = @$_POST['keterangan'];
$no = @$_POST['id'];
$nama = @$_POST['nama'];
$gambar = @$_FILES['gambar']['tmp_name'];
$target = 'tampilan/img/';
$harga = @$_POST['harga'];
$nama_gambar = @$_FILES['gambar']['name'];
$pindah = move_uploaded_file($gambar, $target.$nama_gambar);

if($pindah){
		$data = array('nama' => $nama,'gambar' => $nama_gambar, 'harga'=> $harga,'keterangan'=>$keterangan);
		$crud->update("makanan", $data, "no = '$no'");
		header('location:admin.php');
	}else{
		?>
		<script type="text/javascript">
		alert('gambar gagal di upload');
		</script>
		<?php
echo "ada yang salah";

	}

 ?>
