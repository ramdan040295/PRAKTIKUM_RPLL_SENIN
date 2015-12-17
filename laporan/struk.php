<?php 
include "../model/_crud.mysqli.oop.php";
$crud =new CRUD("localhost","root","","restoran");

$dibayar = @$_POST['dibayar'];
$meja = @$_POST['meja'];
$total = @$_POST['total'];
$kembali = @$_POST['kembali'];


$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("restoran");

include "fpdf.php";
$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','',6);
$pdf->cell(0,2,'SOENDA RESTO','0','1','C',false);
$pdf->SetFont('Arial','',3);
$pdf->cell(0,2,'Merdeka Nusantara','0','1','C',false);
$pdf->cell(0,1,'jl.sukabumi-jampangkulon.tlp.085795460678','0','1','C',false);
$pdf->ln(3);
$pdf->cell(80,0.2,'','0','1','C',false);
$pdf->ln(2);


$pdf->SetFont('Arial','',6);
$pdf->cell(5,5,'No','0,2','0','C');
$pdf->cell(20,5,'Nama','0.2','0','C');
$pdf->cell(10,5,'Harga','0.2','0','C');
$pdf->cell(10,5,'Banyak','0.2','0','C');
$pdf->cell(20,5,'Total','0.2','0','L');
$pdf->Ln(2);
$no = 0;

$sql = mysql_query("SELECT * FROM detail_penjualan WHERE nomor_meja =$meja");

while ($data = mysql_fetch_array($sql)) {
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',6);
	$pdf->cell(5,5,$no.".",0.2,0,'C');
	$pdf->cell(20,5,$data['nama'],0.2,0 ,'C');
	$pdf->cell(10,5,$data['harga'],0.2,0,'C');
	$pdf->cell(10,5,$data['banyak'],0.2,0,'C');
	$pdf->cell(20,5,$data['total'],0.2,0,'L');

}
$pdf->ln(3);
$pdf->SetFont('Arial','',6);
$pdf->cell(5,3,'----------','0,2','0','L');
$pdf->cell(20,3,'-----------------------------------','0.2','0','L');
$pdf->cell(10,3,'-------------------','0.2','0','L');
$pdf->cell(10,3,'-------------------------','0.2','0','C');
$pdf->cell(20,3,'-----------','0.2','0','L');

$pdf->ln(3);
$pdf->SetFont('Arial','',6);
$pdf->cell(5,3,'','0,2','0','L');
$pdf->cell(20,3,'','0.2','0','L');
$pdf->cell(10,3,'','0.2','0','L');
$pdf->cell(10,3,'Total   :','0.2','0','C');
$pdf->cell(20,3,$total,'0.2','0','L');
$pdf->ln(4);
$pdf->SetFont('Arial','',6);
$pdf->cell(5,3,'','0,2','0','L');
$pdf->cell(20,3,'','0.2','0','L');
$pdf->cell(10,3,'','0.2','0','L');
$pdf->cell(10,3,'Di Bayar :','0.2','0','C');
$pdf->cell(20,3,$dibayar,'0.2','0','L');
$pdf->ln(4);
$pdf->SetFont('Arial','',6);
$pdf->cell(5,3,'','0,2','0','C');
$pdf->cell(20,3,'','0.2','0','C');
$pdf->cell(10,3,'','0.2','0','C');
$pdf->cell(10,3,'kembali :','0.2','0','C');
$pdf->cell(20,3,$kembali,'0.2','0','L');
$pdf->ln(4);

$pdf->SetFont('Arial','',5);
$pdf->cell(0,2,'Terimakasih Telah Berkunjung','0','1','C',false);
$pdf->SetFont('Arial','',3);
$pdf->cell(0,2,'Hormat Kami "SOENDA RESTO"','0','1','C',false);
$pdf->cell(0,1,'semoga hari anda selalu menyenangkan','0','1','C',false);

$pdf->Output();

//$crud->delete("final_pesan","final_meja= '$meja'");


 ?>