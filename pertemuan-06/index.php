<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>willy b aja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>HEADER</h1>
  <button class="menu-toggle" id="menuToggle" aria-label="toggle navigation">
    &#9776;
  </button> 
  <nav>
    <ul>
      <li><a href="#home">beranda</a></li>
      <li><a href="#about">tentang</a></li>
      <li><a href="#contact">kontak</a></li>
    </ul>
  </nav>
</header>
<main>
  <section id="home">
  <h1 class="shadow-dance-text">selamat datang &#128516;</h1>
    <p>contoh paragraf HTML</p>
  </section>
  <section id="about">
    <?php
            $nim = "2511500026";
            $Nama = "willy zhea risti";
            $nama = "willy";
            $Tempat,tgl lahir = "Pangkal Pinang, 04 Januari 2007";
            $Hobi = "Mendengarkan musik, memancing, dan bermain game";
            $Pasangan = "for nw i just lovee my self(jommblo jir:v&#128546;)";
            $Pekerjaan ="Belum Ada";
            $cita-cita = "Menjadi progammer, proplayer, engineer";
           
            ?>

            <h2>Tentang Saya</h2>
                <p><strong>NIM:</strong>
                    <?php
                    echo $nim;
                    ?>
                </p>
                <p><strong>Nama:</strong>
                    <?php
                    echo $Nama
                    ?>
                </p>
                <p><strong>Tempat,tgl Lahir:</strong>
                    <?php
                    echo $Tempatlahir
                    ?>
                </p>
                <p><strong>Hobi:</strong>
                    <?php
                    echo $Hobi
                    ?>
                </p>
                <p><strong>Pasangan:</strong>
                    <?php
                    echo $Pasangan
                    ?>
                </p>
                <p><strong>Pekerjaan:</strong>
                    <?php
                    echo $Pekerjaan
                    ?>
                </p>
                <p><strong>cita-cita:</strong>
                    <?php
                    echo $cita-cita
                    ?>
               </p>
        </section>

   <section id="IPK">
            <h2>IPK Saya</h2>
            <?php
            

  </section>
  <section id="contact">
    <h2>Kontak kami</h2>
    <form action="#">
      <div class="form-row">
        <label for="txtnama">Nama:</label>
        <input type="text" id="txtnama" name="txtname" placeholder="masukkan nama" required autocomplete="name">
      </div>

      <div class="form-row">
        <label for="txtemail">Email:</label>
        <input type="email" id="txstemail" name="txtemail" placeholder="masukkan email" required autocomplete="email">
      </div>

      <div class="form-row">
        <label for="txtpesan">Pesan:</label>
        <textarea id="txtpesan" name="txtpesan" rows="4" placeholder="masukkan pesan"  required></textarea>
          <small id="charCount">0/200 karakter</small>
      </div>

      <div class="form-row">
        <div style="width:180px"></div>
        <div>
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </div>
      </div>
    </form>
    <p>from</p>
  </section>
</main>
<footer>
  <p>&copy;willy zhea risti [2511500026]</p>
</footer>

<script src="script.js"></script>
</body>
</html>