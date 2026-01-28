<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$id = $_GET['id'];

$_SESSION['status'] =
    mysqli_query($conn, "DELETE FROM tbl_biodata_dosen WHERE id=$id")
    ? "Data berhasil dihapus"
    : "Gagal menghapus data";

redirect_ke('biodata_list.php');
