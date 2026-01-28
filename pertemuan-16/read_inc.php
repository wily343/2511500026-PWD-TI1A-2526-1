<?php
require 'koneksi.php';

$fieldContact = [
  "nama" => ["label" => "Nama:", "suffix" => ""],
  "email" => ["label" => "Email:", "suffix" => ""],
  "pesan" => ["label" => "Pesan Anda:", "suffix" => ""]
];

$stmt = mysqli_prepare($conn, "SELECT cid, cnama, cemail, cpesan FROM tbl_tamu ORDER BY cid DESC");
if (!$stmt) {
  echo "<p>Query error: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} else {
  mysqli_stmt_execute($stmt);
  $q = mysqli_stmt_get_result($stmt);
  
  if (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
  } else {
    while ($row = mysqli_fetch_assoc($q)) {
      $arrContact = [
        "nama"  => $row["cnama"]  ?? "",
        "email" => $row["cemail"] ?? "",
        "pesan" => $row["cpesan"] ?? "",
      ];
      echo "<div style='margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;'>";
      echo tampilkanBiodata($fieldContact, $arrContact);
      echo "</div>";
    }
  }
  mysqli_stmt_close($stmt);
}
?>
