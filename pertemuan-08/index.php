<?php
session_start();

$nim = $_POST["nim"] ?? "2511500026";
$Nama = $_POST["nama"] ?? "willy zhea risti";
$TempatLahir = $_POST["tempat_lahir"] ?? "Pangkal Pinang, 04 Januari 2007";
$Hobi = $_POST["hobi"] ?? "Mendengarkan musik, memancing, dan bermain game";
$Pasangan = $_POST["pasangan"] ?? "for now i just love myself (jomblo 😭)";
$Pekerjaan = $_POST["pekerjaan"] ?? "Belum Ada";
$citacita = "Menjadi programmer, proplayer, engineer";

$sesnama = $_SESSION["sesnama"] ?? "";
$sesemail = $_SESSION["sesemail"] ?? "";
$sespesan = $_SESSION["sespesan"] ?? "";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil & Kontak</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Website Profil</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Halo dunia! Nama saya willy.</p>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= htmlspecialchars($nim) ?></p>
      <p><strong>Nama:</strong> <?=($Nama) ?></p>
      <p><strong>Tempat Lahir:</strong> <?=($TempatLahir) ?></p>
      <p><strong>Hobi:</strong> <?=($Hobi) ?></p>
      <p><strong>Pasangan:</strong> <?=($Pasangan) ?></p>
      <p><strong>Pekerjaan:</strong> <?=($Pekerjaan) ?></p>
      <p><strong>Cita-cita:</strong> <?=($citacita) ?></p>

    </section>


    <section id="profil">
      <h2>Profil Pengunjung</h2>
      <form action="index.php" method="POST">
        <label><span>NIM:</span>
          <input type="text" name="nim" placeholder="Masukkan NIM" required>
        </label>

        <label><span>Nama Lengkap:</span>
          <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
        </label>

        <label><span>Tempat Lahir:</span>
          <input type="text" name="tempat_lahir" placeholder="Masukkan tempat lahir" required>
        </label>

        <label><span>Hobi:</span>
          <input type="text" name="hobi" placeholder="Masukkan hobi">
        </label>

        <label><span>Pasangan:</span>
          <input type="text" name="pasangan" placeholder="Masukkan pasangan (opsional)">
        </label>

        <label><span>Pekerjaan:</span>
          <input type="text" name="pekerjaan" placeholder="Masukkan pekerjaan">
        </label>

        <label><span>Nama Orang Tua:</span>
          <input type="text" name="Nama Orang Tua" placeholder="Nama Orang Tua">
        </label>

        <label><span>Nama Kakak:</span>
          <input type="text" name="Nama Kakak" placeholder="Nama Kakak">
        </label>

        <label><span>Nama Adik:</span>
          <input type="text" name="Nama Adek" placeholder="Nama Adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

  
    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses_kontak.php" method="POST">
        <label><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" required>
        </label>
        <label><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" required>
        </label>
        <label><span>Pesan:</span>
          <textarea id="txtPesan" name="txtPesan" required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <hr>
        <h3>Yang Menghubungi Kami</h3>
        <p><strong>Nama:</strong> <?= $sesnama ?></p>
        <p><strong>Email:</strong> <?= $sesemail ?></p>
        <p><strong>Pesan:</strong> <?= $sespesan ?></p>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>&copy; willy zhea risti [2511500026]</p>
  </footer>
  <script src="script.js"></script>
</body>
</html>
