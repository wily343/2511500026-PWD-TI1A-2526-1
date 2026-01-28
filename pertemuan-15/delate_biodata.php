<?php
session_start();
require 'koneksi.php';

$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    mysqli_query($conn, "DELETE FROM tbl_biodata_mahasiswa WHERE id = $id");
    $_SESSION['flash_sukses'] = 'Data biodata berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = 'ID tidak valid.';
}

header('Location: read2.php');
exit;
