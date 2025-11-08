<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>willy b aja</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
    <h1>HEADER</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="toggle navigation">&#9776;</button>
    <nav>
        <ul>
            <li><a href="#home">beranda</a></li>
            <li><a href="#about">tentang</a></li>
            <li><a href="#IPK">IPK</a></li>
            <li><a href="#contact">kontak</a></li>
        </ul>
    </nav>
</header>

<main>

<section id="home">
    <h1 class="shadow-dance-text">selamat datang 😄</h1>
    <p>contoh paragraf HTML</p>
</section>


<section id="about">
    <?php
        $nim = "2511500026";
        $Nama = "willy zhea risti";
        $TempatLahir = "Pangkal Pinang, 04 Januari 2007";
        $Hobi = "Mendengarkan musik, memancing, dan bermain game";
        $Pasangan = "for now i just love myself (jomblo 😭)";
        $Pekerjaan = "Belum Ada";
        $citacita = "Menjadi programmer, proplayer, engineer";
    ?>

    <h2>Tentang Saya</h2>
    <p><strong>NIM:</strong> <?php echo $nim; ?></p>
    <p><strong>Nama:</strong> <?php echo $Nama; ?></p>
    <p><strong>Tempat Lahir:</strong> <?php echo $TempatLahir; ?></p>
    <p><strong>Hobi:</strong> <?php echo $Hobi; ?></p>
    <p><strong>Pasangan:</strong> <?php echo $Pasangan; ?></p>
    <p><strong>Pekerjaan:</strong> <?php echo $Pekerjaan; ?></p>
    <p><strong>Cita-cita:</strong> <?php echo $citacita; ?></p>
</section>


<section id="IPK">   
  <h2>IPK Saya</h2>

    <?php
        $namaMatkul1 = "Logika Informatika";
        $namaMatkul2 = "Pengantar Teknik Informatika";
        $namaMatkul3 = "Kalkulus";
        $namaMatkul4 = "Wawasan Berbudi Luhur";
        $namaMatkul5 = "Aplikasi Perkantoran";

        $sksMatkul1 = $sksMatkul2 = $sksMatkul3 = $sksMatkul4 = $sksMatkul5 = 4;

        
        $nilaiHadir1 = 100; $nilaiTugas1 = 90; $nilaiUTS1 = 92; $nilaiUAS1 = 88;
        $nilaiHadir2 = 95;  $nilaiTugas2 = 96; $nilaiUTS2 = 92; $nilaiUAS2 = 88;
        $nilaiHadir3 = 100; $nilaiTugas3 = 90; $nilaiUTS3 = 92; $nilaiUAS3 = 90;
        $nilaiHadir4 = 100; $nilaiTugas4 = 95; $nilaiUTS4 = 95; $nilaiUAS4 = 90;
        $nilaiHadir5 = 100; $nilaiTugas5 = 98; $nilaiUTS5 = 92; $nilaiUAS5 = 95;

        function hitungAkhir($h, $t, $uts, $uas){
            return (0.1*$h)+(0.2*$t)+(0.3*$uts)+(0.4*$uas);
        }

        $nilaiAkhir1 = hitungAkhir($nilaiHadir1,$nilaiTugas1,$nilaiUTS1,$nilaiUAS1);
        $nilaiAkhir2 = hitungAkhir($nilaiHadir2,$nilaiTugas2,$nilaiUTS2,$nilaiUAS2);
        $nilaiAkhir3 = hitungAkhir($nilaiHadir3,$nilaiTugas3,$nilaiUTS3,$nilaiUAS3);
        $nilaiAkhir4 = hitungAkhir($nilaiHadir4,$nilaiTugas4,$nilaiUTS4,$nilaiUAS4);
        $nilaiAkhir5 = hitungAkhir($nilaiHadir5,$nilaiTugas5,$nilaiUTS5,$nilaiUAS5);

        function hitungGrade($hadir, $akhir){
            if ($hadir < 70) return "E";
            elseif ($akhir >= 90) return "A";
            elseif ($akhir >= 80) return "A-";
            elseif ($akhir >= 75) return "B+";
            elseif ($akhir >= 70) return "B";
            elseif ($akhir >= 65) return "B-";
            elseif ($akhir >= 60) return "C+";
            elseif ($akhir >= 55) return "C";
            elseif ($akhir >= 50) return "C-";
            elseif ($akhir >= 35) return "D";
            else return "E";
        }

        function hitungMutu($grade){
            switch ($grade){
                case "A": return 4.0;
                case "A-": return 3.7;
                case "B+": return 3.3;
                case "B": return 3.0;
                case "B-": return 2.7;
                case "C+": return 2.3;
                case "C": return 2.0;
                case "C-": return 1.7;
                case "D": return 1.0;
                default: return 0.0;
            }
        }

        
        $grade1 = hitungGrade($nilaiHadir1,$nilaiAkhir1);
        $grade2 = hitungGrade($nilaiHadir2,$nilaiAkhir2);
        $grade3 = hitungGrade($nilaiHadir3,$nilaiAkhir3);
        $grade4 = hitungGrade($nilaiHadir4,$nilaiAkhir4);
        $grade5 = hitungGrade($nilaiHadir5,$nilaiAkhir5);

        $mutu1 = hitungMutu($grade1);
        $mutu2 = hitungMutu($grade2);
        $mutu3 = hitungMutu($grade3);
        $mutu4 = hitungMutu($grade4);
        $mutu5 = hitungMutu($grade5);

        $bobot1 = $mutu1 * $sksMatkul1;
        $bobot2 = $mutu2 * $sksMatkul2;
        $bobot3 = $mutu3 * $sksMatkul3;
        $bobot4 = $mutu4 * $sksMatkul4;
        $bobot5 = $mutu5 * $sksMatkul5;  // 

        function status($grade){
            return ($grade == "D" || $grade == "E") ? "Not Pass" : "Pass";
        }

        function display($nama, $sks, $hadir, $tugas, $uts, $uas, $akhir, $grade, $mutu, $bobot){
            echo "<h3>$nama</h3>";
            echo "<p><strong>Kredit:</strong> $sks</p>";
            echo "<p><strong>Kehadiran:</strong> $hadir</p>";
            echo "<p><strong>Tugas:</strong> $tugas</p>";
            echo "<p><strong>UTS:</strong> $uts</p>";
            echo "<p><strong>UAS:</strong> $uas</p>";
            echo "<p><strong>Nilai Akhir:</strong> ".number_format($akhir,2)."</p>";
            echo "<p><strong>Huruf Mutu:</strong> $grade</p>";
            echo "<p><strong>Indeks Nilai:</strong> $mutu</p>";
            echo "<p><strong>Bobot:</strong> ".number_format($bobot,2)."</p>";
            echo "<p><strong>Status:</strong> ".status($grade)."</p><br>";
        }

        display($namaMatkul1,$sksMatkul1,$nilaiHadir1,$nilaiTugas1,$nilaiUTS1,$nilaiUAS1,$nilaiAkhir1,$grade1,$mutu1,$bobot1);
        display($namaMatkul2,$sksMatkul2,$nilaiHadir2,$nilaiTugas2,$nilaiUTS2,$nilaiUAS2,$nilaiAkhir2,$grade2,$mutu2,$bobot2);
        display($namaMatkul3,$sksMatkul3,$nilaiHadir3,$nilaiTugas3,$nilaiUTS3,$nilaiUAS3,$nilaiAkhir3,$grade3,$mutu3,$bobot3);
        display($namaMatkul4,$sksMatkul4,$nilaiHadir4,$nilaiTugas4,$nilaiUTS4,$nilaiUAS4,$nilaiAkhir4,$grade4,$mutu4,$bobot4);
        display($namaMatkul5,$sksMatkul5,$nilaiHadir5,$nilaiTugas5,$nilaiUTS5,$nilaiUAS5,$nilaiAkhir5,$grade5,$mutu5,$bobot5);

        $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
        $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
        $IPK = $totalBobot / $totalSKS;

        echo "<h3>Total Bobot: ".number_format($totalBobot,2)."</h3>";
        echo "<h3>Total SKS: $totalSKS</h3>";
        echo "<h2>IPK: ".number_format($IPK,2)."</h2>";
    ?>
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
            <input type="email" id="txtemail" name="txtemail" placeholder="masukkan email" required autocomplete="email">
        </div>

        <div class="form-row">
            <label for="txtpesan">Pesan:</label>
            <textarea id="txtpesan" name="txtpesan" rows="4" placeholder="masukkan pesan" required></textarea>
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
</section>

</main>

<footer>
    <p>&copy; willy zhea risti [2511500026]</p>
</footer>

<script src="script.js"></script>
</body>
</html>