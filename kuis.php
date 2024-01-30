<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>bbi</title>
    <link rel="stylesheet" href="CSS/kuis.css" />
    <!-- boostrap -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="pembungkus">
      <div class="navbar21">
        <a href="/index.php">Home</a>
        <a href="/index.php#about1">About</a>
        <a href="/index.php#testimonials">Information</a>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form
            action="upload.php"
            method="post"
            enctype="multipart/form-data"
            class="mb-5">
            <h2 class="text-center mt-4 mb-4 text-dark">
              Form Pegisisian
            </h2>
            <div class="form-group">
              <label for="nama" class="text-dark">Nama</label>
              <input
                type="text"
                class="form-control"
                id="nama"
                name="nama"
                required />
            </div>
            <div class="form-group">
              <label for="email" class="text-dark">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                required />
            </div>
            <div class="form-group">
              <label for="hp" class="text-dark">Nomor HP</label>
              <input
                type="tel"
                class="form-control"
                id="hp"
                name="hp"
                pattern="[0-9]+"
                required />
            </div>
            <div class="form-group">
            <label for="gender" class="text-dark">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="" disabled selected>-- Jenis Kelamin --</option>
              <option value="laki-laki">Laki-Laki</option>
              <option value="perempuan">Perempuan</option>
              
            </select>
          </div>
            <div class="form-group">
              <label for="tinggi" class="text-dark">Tinggi</label>
              <input
                type="number"
                class="form-control"
                id="tinggi"
                name="tinggi"
                required />
            </div>
            <div class="form-group">
              <label for="gula" class="text-dark">Kadar gula darah mg/dl</label>
              <input
                type="number"
                class="form-control"
                id="gula"
                name="gula"
                required />
            </div>

            <div class="form-group">
              <label for="berat" class="text-dark">Berat Badan</label>
              <input
                type="number"
                class="form-control"
                id="berat"
                name="berat"
                required />
            </div>
            <div class="form-group">
              <label for="usia" class="text-dark">Umur</label>
              <input
                type="number"
                class="form-control"
                id="usia"
                name="usia"
                required />
            </div>
            <button
              type="submit"
              class="btn btn-success"
              id="daftar"
              name="daftar"
              >
              Daftar
            </button>
            <button type="reset" class="btn btn-danger" name="batal" id="batal">
              Batal
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
