<?php 
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodata_mahasiswa ORDER BY id DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>

<h2>Data Biodata Mahasiswa</h2>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>NIM</th>
    <th>Nama Lengkap</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Orang Tua</th>
    <th>Kakak</th>
    <th>Adik</th>
    <th>Dibuat</th>
  </tr>

  <?php $no = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
  <tr>
    <td><?= $no++; ?></td>
    <td>
      <a href="edit_biodata.php?id=<?= (int)$row['id']; ?>">Edit</a> |
      <a onclick="return confirm('Yakin hapus biodata <?= htmlspecialchars($row['nama_lengkap']); ?>?')"
         href="proses_delete_biodata.php?id=<?= (int)$row['id']; ?>">
         Delete
      </a>
    </td>
    <td><?= htmlspecialchars($row['nim']); ?></td>
    <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
    <td><?= htmlspecialchars($row['tempat_lahir']); ?></td>
    <td><?= formatTanggal($row['tanggal_lahir']); ?></td>
    <td><?= htmlspecialchars($row['hobi']); ?></td>
    <td><?= htmlspecialchars($row['pasangan']); ?></td>
    <td><?= htmlspecialchars($row['pekerjaan']); ?></td>
    <td><?= htmlspecialchars($row['nama_ortu']); ?></td>
    <td><?= htmlspecialchars($row['nama_kakak']); ?></td>
    <td><?= htmlspecialchars($row['nama_adik']); ?></td>
    <td><?= $row['created_at']; ?></td>
  </tr>
  <?php endwhile; ?>
</table>
