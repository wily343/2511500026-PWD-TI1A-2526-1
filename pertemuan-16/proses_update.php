<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$id    = $_POST['id'];
$nama  = bersihkan($_POST['nama']);
$email = bersihkan($_POST['email']);
$prodi = bersihkan($_POST['prodi']);

$sql = "UPDATE tbl_biodata_dosen
        SET nama='$nama', email='$email', prodi='$prodi'
        WHERE id=$id";

$_SESSION['status'] =
    mysqli_query($conn, $sql) ? "Update berhasil" : "Update gagal";

redirect_ke('biodata_list.php');
