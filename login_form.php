<?php
// Pastikan file konfigurasi database sudah disertakan
include('koneksi.php');
// Inisialisasi pesan kesalahan
// Inisialisasi pesan kesalahan
$errorMsg = '';

// Periksa apakah formulir telah dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi login (contoh sederhana, gunakan yang lebih aman di produksi)
    if ($username === 'admin' && $password === 'admin123') {
        // Login berhasil
        // Redirect ke halaman admin.php
        header('Location: admin.php');
        exit();
    } else {
        // Login gagal
        $errorMsg = 'Login gagal. Silakan coba lagi.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <style>
    body {
  font-family: Arial, sans-serif;
 
  background-image: url('./img/kuis2.jpg');
  background-size: cover;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

.container {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h2{
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
  width: 30vw;
  height: 40vh;
}

label {
  margin-bottom: 8px;
}

input {
  width: 80%;
  padding: 8px;
  margin-bottom: 16px;
}
.hero{
  padding-left:2rem ;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 10vw;
}

button:hover {
  background-color: #0056b3;
}
/* Tambahkan gaya untuk pesan kesalahan */
.error-message {
  color: red;
  margin-bottom: 10px;
}


  </style>
</head>
<body>
<div class="container">
    <form  method="post">
      <h2>Login Admin</h2>
      <div class="hero">
      <!-- Tambahkan pesan kesalahan di sini -->
      <p class="error-message"><?php echo $errorMsg; ?></p>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Login</button>
      </div>
    </form>
  </div>
</body>
</html>
