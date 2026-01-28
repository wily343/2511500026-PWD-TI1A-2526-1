<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('edit.php');
}

$nidn  = bersihkan($_POST['nidn']);
$nama  = bersihkan($_POST['nama']);
$email = bersihkan($_POST['email']);
$prodi = bersihkan($_POST['prodi']);

// Validasi input
if (empty($nidn) || empty($nama) || empty($email) || empty($prodi)) {
    $_SESSION['status'] = "Semua field harus diisi";
    redirect_ke('edit.php');
}

// Gunakan prepared statement untuk keamanan
$stmt = mysqli_prepare($conn, "INSERT INTO tbl_biodata_dosen (nidn, nama, email, prodi) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    $_SESSION['status'] = "Query error: " . htmlspecialchars(mysqli_error($conn));
    redirect_ke('edit.php');
}

mysqli_stmt_bind_param($stmt, "ssss", $nidn, $nama, $email, $prodi);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['status'] = "Data berhasil disimpan";
} else {
    $_SESSION['status'] = "Gagal menyimpan data: " . htmlspecialchars(mysqli_stmt_error($stmt));
}
mysqli_stmt_close($stmt);

redirect_ke('index.php#biodata-dosen');
