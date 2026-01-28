<?php
session_start();
require_once 'koneksi.php';
require_once 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#biodata');
    exit;
}

$sql = "INSERT INTO tbl_biodata_mahasiswa
(nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_ortu, nama_kakak, nama_adik)
VALUES (?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $_POST['txtNim'],
    $_POST['txtNmLengkap'],
    $_POST['txtT4Lhr'],
    $_POST['txtTglLhr'],
    $_POST['txtHobi'],
    $_POST['txtPasangan'],
    $_POST['txtKerja'],
    $_POST['txtNmOrtu'],
    $_POST['txtNmKakak'],
    $_POST['txtNmAdik']
);

mysqli_stmt_execute($stmt);

/* PRG */
header('Location: read2.php');
exit;
