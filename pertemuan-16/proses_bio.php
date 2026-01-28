<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('biodata_dosen.php');
}

$nidn  = bersihkan($_POST['nidn']);
$nama  = bersihkan($_POST['nama']);
$email = bersihkan($_POST['email']);
$prodi = bersihkan($_POST['prodi']);

$sql = "INSERT INTO tbl_biodata_dosen (nidn,nama,email,prodi)
        VALUES ('$nidn','$nama','$email','$prodi')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['status'] = "Data berhasil disimpan";
} else {
    $_SESSION['status'] = "Gagal menyimpan data";
}

redirect_ke('biodata_list.php');
