<?php
<form action="proses.php" method="post">
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  $_SESSION["flash_error"] = "akses tidak valid.";
    redirect_ke("index.php#contact");
}

$nama = bersihkan($_POST["txtNama"] ?? "");
$email = bersihkan($_POST["txtEmail"] ?? "");   
$pesan = bersihkan($_POST["txtPesan"] ?? "");

$eror = [];

if (nama === '') {
    $eror[] = "nama wajib diisi.";
}

if ($email === '') {
    $eror[] = "email wajib diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $eror[] = "format email tidak valid.";
}

if ($pesan === '') {
    $eror[] = "pesan wajib diisi.";
}

if (!empty($eror)) {
    $_SESSION["old"] = [
        "nama"  => $nama,
        "email" => $email,
        "pesan" => $pesan
    ];
    $_SESSION["flash_error"] = implode("<br>", $eror);
    redirect_ke("index.php#contact");
}

