<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php#biodata-dosen');
}

// Validasi ID
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$id) {
    $_SESSION['status'] = "Akses tidak valid.";
    redirect_ke('index.php#biodata-dosen');
}

$nama  = bersihkan($_POST['nama'] ?? '');
$email = bersihkan($_POST['email'] ?? '');
$prodi = bersihkan($_POST['prodi'] ?? '');

// Validasi input
if (empty($nama) || empty($email) || empty($prodi)) {
    $_SESSION['status'] = "Semua field harus diisi.";
    redirect_ke('biodata_edit.php?id=' . $id);
}

// Gunakan prepared statement untuk update
$stmt = mysqli_prepare($conn, "UPDATE tbl_biodata_dosen SET nama = ?, email = ?, prodi = ? WHERE id = ?");
if (!$stmt) {
    $_SESSION['status'] = "Query error: " . htmlspecialchars(mysqli_error($conn));
    redirect_ke('biodata_edit.php?id=' . $id);
}

mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $prodi, $id);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['status'] = "Data berhasil diperbarui.";
} else {
    $_SESSION['status'] = "Gagal memperbarui data: " . htmlspecialchars(mysqli_stmt_error($stmt));
}
mysqli_stmt_close($stmt);

redirect_ke('index.php#biodata-dosen');
?>
