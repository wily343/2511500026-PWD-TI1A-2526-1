<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$arrBiodata =[
     "nim" => $_POST["txtNim"] ?? "",
     "nama" => $_POST["txtnmLengkap"] ?? "",
     "tempat" => $_POST["txtNim"] ?? "",
     "tanggal" => $_POST["txtNim"] ?? "",
     "hobi" => $_POST["txtNim"] ?? "",
     "pasangan" => $_POST["txtNim"] ?? "",
     "pekerjaan" => $_POST["txtNim"] ?? "",
     "ortu" => $_POST["txtNim"] ?? "",
     "kakak" => $_POST["txtNim"] ?? "",
     "adik" => $_POST["txtNim"] ?? "",
];
     
$_SESSION["txtNim"] = $txtNim;
$_SESSION["txtNmLengkap"] = $txtNmLengkap;
$_SESSION["txtT4Lhr"] = $txtT4Lhr;
$_SESSION["txtTglLhr"] = $txtTglLhr;
$_SESSION["txtHobi"] = $txtHobi;
$_SESSION["txtPasangan"] = $txtPasangan;
$_SESSION["txtKerja"] = $txtKerja;
$_SESSION["txtNmOrtu"] = $txtNmOrtu;
$_SESSION["txtNmKakak"] = $txtNmKakak;
$_SESSION["txtNmAdik"] = $txtNmAdik;
header("location: index.php");
?>