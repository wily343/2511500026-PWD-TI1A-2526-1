<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="biodata">
      <h2>Form Biodata Dosen</h2>
      <form action="proses_bio.php" method="POST">

        <label for="nidn"><span>NIDN:</span>
          <input type="text" id="nidn" name="nidn" placeholder="Masukkan NIDN" required>
        </label>

        <label for="nama"><span>Nama:</span>
          <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </label>

        <label for="email"><span>Email:</span>
          <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
        </label>

        <label for="prodi"><span>Prodi:</span>
          <input type="text" id="prodi" name="prodi" placeholder="Masukkan Prodi" required>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
    $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
    $old          = $_SESSION['old'] ?? []; #untuk nilai lama form

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']); #bersihkan 3 session ini
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama"
            required autocomplete="name"
            value="<?= isset($old['nama']) ? htmlspecialchars($old['nama']) : '' ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email"
            required autocomplete="email"
            value="<?= isset($old['email']) ? htmlspecialchars($old['email']) : '' ?>">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
            required><?= isset($old['pesan']) ? htmlspecialchars($old['pesan']) : '' ?></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha" placeholder="Jawab Pertanyaan..."
            required
            value="<?= isset($old['captcha']) ? htmlspecialchars($old['captcha']) : '' ?>">
        </label>

        <button type=" submit">Kirim</button>
          <button type="reset">Batal</button>
      </form>

      <br>
      <hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>

    <section id="biodata-dosen">
      <?php
      require 'koneksi.php';

      $data = mysqli_query($conn, "SELECT * FROM tbl_biodata_dosen");
      ?>

      <h2>Data Biodata Dosen</h2>

      <?php
      if (isset($_SESSION['status'])) {
          echo "<p>{$_SESSION['status']}</p>";
          unset($_SESSION['status']);
      }
      ?>

      <table border="1" cellpadding="8">
      <tr>
        <th>No</th>
        <th>NIDN</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Prodi</th>
        <th>Aksi</th>
      </tr>

      <?php $no=1; while($d = mysqli_fetch_assoc($data)) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['nidn'] ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['email'] ?></td>
        <td><?= $d['prodi'] ?></td>
        <td>
          <a href="biodata_edit.php?id=<?= $d['id'] ?>">Edit</a> |
          <a href="biodata_hapus.php?id=<?= $d['id'] ?>"
             onclick="return confirm('Yakin hapus data?')">Delete</a>
        </td>
      </tr>
      <?php } ?>
      </table>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>