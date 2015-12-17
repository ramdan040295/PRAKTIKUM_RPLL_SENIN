<?php

$harga = @$_POST['harga'];

$pembayaran = @$_POST['pembayaran'];

$tot = $pembayaran - $harga;


if($tot >= 0){
echo "kembali :";

echo $tot;

}elseif ($tot < 0 ) {
	echo "uang anda tidak mencukupi";
	
}

  ?>