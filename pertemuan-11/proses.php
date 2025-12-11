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

    # menyiapkan query INSERT dengan prepared statement
    $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
    # jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#contact');
}

        # bind parameter dan eksekusi (s = string)
            mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

    if (mysqli_stmt_execute($stmt)) { 
            # jika berhasil, kosongkan old value, beri pesan sukses
    unset($_SESSION['old']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
    redirect_ke('index.php#contact'); # pola PRG: kembali ke form / halaman home

    } else { 
            # jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan,
    ];
    $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#contact');
}

# tutup statement
mysqli_stmt_close($stmt);

    $arrContact = [];