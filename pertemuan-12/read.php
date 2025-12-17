<?php
session_start();
require 'fungsi.php';
require 'koneksi.php';

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query eror: " . mysqli_error($conn));
}
?>

<?php
    $flash_success = $_SESSION['flash_success'] ?? '';
    $flash_error = $_SESSION['flash_error'] ?? '';  
    unset($_SESSION['flash_success'], $_SESSION['flash_error']);
 ?>

  <?php if (!empty($flash_success)): ?>
    <div style="color: green; border: 1px solid green; padding: 8px; margin-bottom: 16px;">
      <?= $flash_success; ?>
    </div>
  <?php endif; ?>

    <?php if (!empty($flash_error)): ?>
    <div style="color: red; border: 1px solid red; padding: 8px; margin-bottom: 16px;">
      <?= $flash_error; ?>
    </div>
  <?php endif; ?>

  <table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>aksi</th>
    <th>ID</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>Tanggal-</th>
  </tr>

  <?php $no = 1; 
    while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
    <td><?= $no++; ?></td>
    <td><a href="edit.php?cid=<?= (int)$row['cid']; ?>">edit</a></td>
    <td><?= $row['cid']; ?></td>
    <td><?= htmlspecialchars($row['cnama']); ?></td>
    <td><?= htmlspecialchars($row['cemail']); ?></td>
    <td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
    <td><?= date('d-m-Y H:i', strtotime($row['dcreated_at'])); ?></td>

    </tr>
    <?php endwhile;?>
</table>