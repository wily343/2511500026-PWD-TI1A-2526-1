<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$id = (int)($_GET['id'] ?? 0);
$q = mysqli_query($conn, "SELECT * FROM tbl_biodata_mahasiswa WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    die("Data tidak ditemukan");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sql = "UPDATE tbl_biodata_mahasiswa SET
        nim=?,
        nama_lengkap=?,
        tempat_lahir=?,
        tanggal_lahir=?,
        hobi=?,
        pasangan=?,
        pekerjaan=?,
        nama_ortu=?,
        nama_kakak=?,
        nama_adik=?
        WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssi",
        $_POST['nim'],
        $_POST['nama'],
        $_POST['tempat'],
        $_POST['tanggal'],
        $_POST['hobi'],
        $_POST['pasangan'],
        $_POST['pekerjaan'],
        $_POST['ortu'],
        $_POST['kakak'],
        $_POST['adik'],
        $id
    );

    mysqli_stmt_execute($stmt);
    header('Location: read2.php');
    exit;
}
?>

<h2>Edit Biodata</h2>

<form method="POST">
  NIM: <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>"><br><br>
  Nama: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_lengkap']); ?>"><br><br>
  Tempat Lahir: <input type="text" name="tempat" value="<?= htmlspecialchars($data['tempat_lahir']); ?>"><br><br>
  Tanggal Lahir: <input type="date" name="tanggal" value="<?= $data['tanggal_lahir']; ?>"><br><br>
  Hobi: <input type="text" name="hobi" value="<?= htmlspecialchars($data['hobi']); ?>"><br><br>
  Pasangan: <input type="text" name="pasangan" value="<?= htmlspecialchars($data['pasangan']); ?>"><br><br>
  Pekerjaan: <input type="text" name="pekerjaan" value="<?= htmlspecialchars($data['pekerjaan']); ?>"><br><br>
  Orang Tua: <input type="text" name="ortu" value="<?= htmlspecialchars($data['nama_ortu']); ?>"><br><br>
  Kakak: <input type="text" name="kakak" value="<?= htmlspecialchars($data['nama_kakak']); ?>"><br><br>
  Adik: <input type="text" name="adik" value="<?= htmlspecialchars($data['nama_adik']); ?>"><br><br>

  <button type="submit">Update</button>
  <a href="read2.php">Batal</a>
</form>
