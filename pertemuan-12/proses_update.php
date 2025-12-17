<?php
    session_start();
    require_once __DIR__ . '/koneksi.php';
    require_once __DIR__ . '/fungsi.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $_SESSION['flash_error'] = 'Akses tidak valid.';
      redirect_ke('read.php');
    }

    $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1]
    ]);

    if (!$cid) {
        $_SESSION['flash_error'] = 'CID tidak valid.';
        redirect_ke('edit.php?cid=' . $cid);
    }

    $nama  = bersihkan($_POST['txtNama'] ?? '');
    $email = bersihkan($_POST['txtEmail'] ?? '');
    $pesan = bersihkan($_POST['txtPesan'] ?? '');
    $captcha = bersihkan($_POST['txtCaptcha_Sederhana'] ?? '');
    $tanggal = date("Y-m-d H:i:s");
    $errors = [];

    if ($nama === '') {
      $errors[] = 'Nama wajib diisi.';
    }

    if ($email === '') {
      $errors[] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = 'Format e-mail tidak valid.';
    }


    if ($pesan === '') {
      $errors[] = 'Pesan wajib diisi.';
    }

    if ($captcha === '') {
      $errors[] = 'pertanyaan wajib diisi.';
    }

    if (mb_strlen($nama) < 3) {
      $errors[] = 'Nama minimal 3 karakter.';
    }

    if (mb_strlen($pesan) < 10) {
      $errors[] = 'Pesan minimal 10 karakter.';
    }

    if($captcha !=5) {
      $errors[] = 'Captcha salah.';
    }

    if (!empty($errors)) {
      $_SESSION['old'] = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $pesan,
        'captcha' => $captcha,
      ];

      $_SESSION['flash_error'] = implode('<br>', $errors);
      redirect_ke('edit.php?cid=' . $cid);
    }

    $stmt = mysqli_prepare($conn, "UPDATE tbl_tamu SET cnama = ?, cemail = ?, cpesan = ?, ctanggal = ? WHERE cid = ?");
    if (!$stmt) {
        $_SESSION['flash_error'] = 'terjadi kesalahan sistem (prepare gagal).';
        redirect_ke('edit.php?cid=' . (int)$cid);
    }

    mysqli_stmt_bind_param($stmt, "ssi",$nama, $email, $pesan, $tanggal, $cid);

    if (!mysqli_stmt_execute($stmt)) {
        unset($_SESSION['old']);


        $_SESSION['flash_sukses'] = 'terimakasi data anda sudah diperbarui.';
        redirect_ke('read.php');
    } else {
        $_SESSION['old'] = [
          'nama' => $nama,
          'email' => $email,
          'pesan' => $pesan,
          'captcha' => $captcha,
        ];
        $_SESSION['flash_error'] = 'data gagal diperbarui. silahkan coba lagi.';
        redirect_ke('edit.php?cid=' . (int)$cid);
    }

    mysqli_stmt_close($stmt);

    redirect_ke('edit.php?cid=' . (int)$cid);