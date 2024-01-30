<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST["tambah_pdf"])) {
       header("Location: tambah_pdf.php");
       exit();
   } elseif (isset($_POST["edit_pdf"])) {
       header("Location: edit_pdf.php");
       exit();
   }
}

$query = "SELECT * FROM menu";
$result = mysqli_query($sat, $query);
// Fungsi untuk menambah data makanan
function tambahMakanan($nama, $deskripsi)
{
    global $sat;
    $sql = "INSERT INTO makanan (nama, deskripsi) VALUES ('$nama', '$deskripsi')";
    if ($sat->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk mengedit data makanan
function editMakanan($id, $nama, $deskripsi)
{
    global $sat;
    $sql = "UPDATE makanan SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    if ($sat->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk menghapus data makanan
function hapusMakanan($id)
{
    global $sat;
    $sql = "DELETE FROM makanan WHERE id=$id";
    if ($sat->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        tambahMakanan($nama, $deskripsi);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        editMakanan($id, $nama, $deskripsi);
    } elseif (isset($_POST['hapus'])) {
        $id = $_POST['id'];
        hapusMakanan($id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Admin Panel</title>
   <link rel="stylesheet" href="CSS/admin.css">

</head>
<body>
<nav class="navbar">
      <a href="index.php" class="navbar-logo"
        ><span id="span2">Care</span><span id="span1">Diabell</span></a
      >
      <div class="navbar-nav">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="tambah_pdf.php">Tambah PDF</a></li>
          <li><a href="edit_pdf.php">Edit PDF</a></li>
          <li><a href="#cardadmin">Card</a></li>
          
        </ul>
      </div>
      <div class="navbar-extra1">
        <a href="#" id="hamburger-menu1"> <i data-feather="menu"></i></a>
      </div>
    </nav>
   <section class="admin">

   <h1>Selamat datang di Admin Panel</h1>


   <h2>Daftar Menu</h2>

   <table>
       <tr>
           <th>ID</th>
           <th>Nama</th>
           <th>Berkas</th>
           <th>Unduh</th>
       </tr>

       <?php
       while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           echo "<td>{$row['id']}</td>";
           echo "<td>{$row['nama']}</td>";
           echo "<td>{$row['berkas']}</td>";
           // Tambahkan tautan unduh dengan mengarahkan ke file download.php
           echo "<td><a href='download.php?file={$row['berkas']}'>Unduh</a></td>";
           echo "</tr>";
       }
       ?>
   </table>
   </section>
   <section class="cardadmin" id="cardadmin">
   <h1>Edit card menu dilarang</h1>

<!-- Form untuk menambah atau mengedit data -->
<form method="post" action="admin.php" class="edit">
    <label for="nama">Nama Makanan:</label>
    <input type="text" name="nama" required>

    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" required></textarea>

    <!-- Hidden field untuk menyimpan ID saat mengedit -->
    <input type="hidden" name="id">

    <!-- Tombol untuk menambah atau mengedit data -->
    <button type="submit" name="tambah">Tambah Makanan</button>
    <button type="submit" name="edit">Edit Makanan</button>
</form>

<hr>

<!-- Tampilkan data makanan dan form untuk menghapus -->
<?php
$sql = "SELECT id, nama, deskripsi FROM makanan";
$result = $sat->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <div class="makanan">
            <strong><?php echo $row['nama']; ?></strong>
            <p><?php echo $row['deskripsi']; ?></p>

            <!-- Form untuk menghapus data -->
            <form method="post" action="admin.php" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="hapus" id="hilang">Hapus</button>
            </form>

            <!-- Tombol untuk mengisi form saat mengedit -->
            <button onclick="isiForm(<?php echo $row['id']; ?>,'<?php echo $row['nama']; ?>','<?php echo $row['deskripsi']; ?>')">Edit</button>
        </div>
<?php
    }
} else {
    echo "Tidak ada data makanan.";
}
?>
</section>
<!-- Script untuk mengisi form saat mengedit -->
<script>
    function isiForm(id, nama, deskripsi) {
        document.getElementsByName('id')[0].value = id;
        document.getElementsByName('nama')[0].value = nama;
        document.getElementsByName('deskripsi')[0].value = deskripsi;
    }
</script>

</body>
</html>

<?php
$sat->close();
?>