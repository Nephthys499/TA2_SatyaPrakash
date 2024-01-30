
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <script
      src="https://kit.fontawesome.com/6deee56153.js"
      crossorigin="anonymous"></script>
</head>
<style>
    /* page hasil */
    .hasil{
        padding: 7rem 7% 1.4rem;
        display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
    }
.hasil .result-container {
  margin-top: 20px;
  border: solid 1px #000;
  padding : 1rem;
  width: 800px;

}

.hasil .result-container .result {
  font-size: 18px;
  margin-bottom: 8px;
}
/* Add this to your existing styles or in the head of your HTML */



.result p {
    margin: 10px 0;
}

.result ul {
    list-style-type: disc;
    padding-left: 20px;
}

.result li {
    margin-bottom: 8px;
    line-height: 1.4;
}


.result-container .btn-container {
  margin-top: 30px;
}

.hasil .result-container .btn-primary {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 18px;
}
/* .service-box{
    width: 50vw;
} */
.services-box-container {
  max-width: 600px;
  width: 90%;
  display: flex;
  justify-content: center;
  margin: 40px auto;
}
.services-box-container .service-box p {
  color: #122853;
  font-size: 0.9rem;
  line-height: 1.4rem;
  display: -webkit-box;
  -webkit-line-clamp: 8;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
@media (max-width: 768px) {
    .hasil .result-container {
  margin-top: 20px;
  border: solid 1px #000;
  padding : 1rem;
  width: 450px;

}

.hasil .result-container .result {
  font-size: 14px;
  margin-bottom: 8px;
}
.hasil .result-container .btn-primary {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  font-size: 14px;
}

}
</style>
<body>
<nav class="navbar">
      <a href="#" class="navbar-logo"
        ><span id="span2">Care</span><span id="span1">Diabell</span></a
      >
      <div class="navbar-nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#testimonials">Information</a></li>
          <li><a href="index.php#our-services">Menu</a></li>
          <li><a href="index.php#about1">About</a></li>
        </ul>
      </div>
      <div class="navbar-extra1">
        <a href="#" id="hamburger-menu1"> <i data-feather="menu"></i></a>
      </div>
    </nav>
    <!-- PHP start -->
    <?php
    require_once 'koneksi.php';

    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $hp = $_POST['hp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tinggi = $_POST['tinggi'];
        $berat = $_POST['berat'];
        $usia = $_POST['usia'];
        $gula = $_POST['gula'];

        $query = "INSERT INTO pendaftar (nama, email, hp, jenis_kelamin, tinggi, berat, usia, gula) 
                  VALUES ('$nama', '$email', '$hp', '$jenis_kelamin', '$tinggi', '$berat', '$usia', '$gula')";

        $result = mysqli_query($sat, $query);

        if ($result) {
            echo "<script>alert('Pendaftaran berhasil!');</script>";

            if (($jenis_kelamin == "laki-laki" && $tinggi > 160) || ($jenis_kelamin == "perempuan" && $tinggi > 150)) {
                $bbi = ($tinggi - 100) * 1;
            } else {
                $bbi = ($tinggi - 100) * 0.9;
            }

            if ($jenis_kelamin == "laki-laki") {
                $kalori = 35 * $bbi;
            } elseif ($jenis_kelamin == "perempuan") {
                $kalori = 30 * $bbi;
            }

            
            $kalori_genap = round($kalori / 100) * 100;
    ?>
<section class="hasil">
            <!-- Display the results -->
            
            <div class="result-container">
                <h1>Hasil Perhitungan</h1>
                <div class="result">Berat Badan Ideal anda (BBI) &nbsp;&nbsp; : <?php echo $bbi; ?> &nbsp; &nbsp; &nbsp;kg</div>
                <div class="result">jumlah Kalori dibutuhkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :  <?php echo $kalori; ?> kkal</div>
                <div class="result">jumlah kalori yang disarankan &nbsp;: <?php echo $kalori_genap; ?> kkal</div>
                <?php
    // Check blood sugar level and display the result
    echo "<div class='result'>";

    if ($gula > 200) {
      echo "Kadar gula darah tinggi";
      echo "<p>Saran:</p>";
      echo "<ul>";
      echo "<li>Konsultasikan dengan dokter.</li>";
      echo "<li>Hindari konsumsi makanan dan minuman tinggi gula.</li>";
      echo "<li>Pertimbangkan untuk meningkatkan aktivitas fisik secara perlahan sesuai saran dokter.</li>";
      echo "<li>Monitor secara rutin kadar gula darah dan catat hasilnya.</li>";
      echo "</ul>";
    } elseif ($gula >= 70 && $gula <= 200) {
        echo "Kadar gula darah normal: $gula mg/dL";
        echo "<p>Saran: Pertahankan pola makan sehat, hindari makanan tinggi gula, dan pertimbangkan untuk menjaga aktivitas fisik.</p>";
    } else {
        echo "Kadar gula darah rendah: $gula mg/dL";
        echo "<p>Saran: Konsumsi makanan tinggi karbohidrat seperti buah atau roti, dan perhatikan kadar gula darah Anda secara berkala.</p>";
    }

    echo "</div>";
    ?>
                <?php
                $query_menu = "SELECT * FROM menu WHERE id = $kalori_genap";
                $result_menu = mysqli_query($sat, $query_menu);

                if ($result_menu->num_rows > 0) {
                    $row_menu = mysqli_fetch_assoc($result_menu);
                    $pdf_id = $row_menu['id'];
                ?>
                    <!-- Button to download -->
                    <div class="btn-container">
                        <form action="unduh_menu.php" method="post">
                            <input type="hidden" name="pdf_id" value="<?php echo $pdf_id; ?>">
                            <button type="submit" class="btn btn-primary">Unduh disini</button>
                        </form>
                    </div>
                <?php
                } else {
                    echo "<div>Menu tidak ditemukan untuk kalori yang diberikan.</div>";
                }
                ?>
            </div>
            <div class="services-box-container">
            <div class="service-box s-box2">
            <i class="fa-solid fa-person-running"></i>
                <strong> Aktivitas fisik </strong>
                <p>
                untuk mengontrol diabetes tidak cukup hanya dengan menerapkan pola makana dan makanan sehat saja, disarankan agar lebih sering aktivitas fisik setidaknya 150 menit per minggu dengan intensitas sedang contohnya seperti jalan cepat, aerobik, sepedaan, renang dan lain-lain. akan lebih baik jika waktu dan intensitas olah raga ditambahkan.
                </p>
                
              </div>
              </div>
            </section>
    <?php
        } else {
            echo "<script>alert('Pendaftaran gagal!');</script>";
        }

        mysqli_close($sat);
    }
    ?>
    <!-- PHP end -->
    <script src="JS/script.js"></script>
</body>
</html>