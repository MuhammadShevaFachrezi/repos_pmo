<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "pmo";
 
$conn = mysqli_connect($host, $user, $pass,$dbnm);

//akhir koneksi
 
#ambil data di tabel dan masukkan ke array
$query = "SELECT * FROM tbl_timesheet ORDER BY no_timesheet";
$sql = mysqli_query ($conn,$query);
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabel
$judul = "Data Timesheet";
$header = array(
		array("label"=>"no_timesheet", "length"=>90, "align"=>"L"),
		array("label"=>"tanggal", "length"=>60, "align"=>"L"),
		array("label"=>"pekerjaan", "length"=>50, "align"=>"L"),
		array("label"=>"kegiatan", "length"=>50, "align"=>"L"),
		array("label"=>"id_pegawai", "length"=>90, "align"=>"L"),
		array("label"=>"nama_pegawai", "length"=>90, "align"=>"L"),
		array("label"=>"pic", "length"=>90, "align"=>"L"),
		array("label"=>"durasi", "length"=>90, "align"=>"L"),
		array("label"=>"progress", "length"=>90, "align"=>"L"),
    
	);
 
#sertakan library FPDF dan bentuk objek
require_once('fpdf182/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
 
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(244, 219, 54);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 10, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(138, 206, 223);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
//print_r($data);
foreach ($data as $baris) {
	//print_r($baris);
	//echo "<br>";
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 3, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
}
 
#output file PDF
$pdf->Output();
?>