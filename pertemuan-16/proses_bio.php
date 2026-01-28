<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('edit.php');
}

$id    = $_POST['id'];          // ⬅️ TAMBAHAN
$nidn  = bersihkan($_POST['nidn']);
$nama  = bersihkan($_POST['nama']);
$email = bersihkan($_POST['email']);
$prodi = bersihkan($_POST['prodi']);

if (empty($nidn) || empty($nama) || empty($email) || empty($prodi)) {
    $_SESSION['status'] = "Semua field harus diisi";
    redirect_ke('edit.php?id='.$id);
}

/* ✅ FIX LINE 29: GANTI INSERT → UPDATE */
$stmt = mysqli_prepare(
    $conn,
    "UPDATE tbl_biodata_dosen
     SET nama=?, email=?, prodi=?
     WHERE id=?"
);

if (!$stmt) {
    $_SESSION['status'] = "Query error: " . htmlspecialchars(mysqli_error($conn));
    redirect_ke('edit.php?id='.$id);
}

mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $prodi, $id);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['status'] = "Data berhasil diperbarui";
} else {
    $_SESSION['status'] = "Gagal update data: " . htmlspecialchars(mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

/* PRG */
redirect_ke('index.php#biodata-dosen');
