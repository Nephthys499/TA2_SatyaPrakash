<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Validasi ID (pastikan di antara 1500 dan 2500)
    if ($id < 1500 || $id > 2500) {
        die("ID tidak valid.");
    }

    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $upload_dir = "path/to/pdf/directory/";

    move_uploaded_file($file_tmp, $upload_dir . $file_name);

    $query = "UPDATE menu SET berkas = '$file_name' WHERE id = '$id'";
    mysqli_query($sat, $query);

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit PDF</title>
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
.classedit{
    border: 2px solid #000;
    padding: 2rem;
}
        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            padding-bottom: 1rem;
        }

        input {
            margin-bottom: 1rem;
            padding-bottom: 8px;
            font-size: 16px;
        }
        select#id{
            margin-bottom: 1rem;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="classedit">
    <h1>Edit PDF</h1>
    <form action="edit_pdf.php" method="post" enctype="multipart/form-data">
    <label for="id">ID Menu (1500-2500): </label>
<select name="id" id="id" required>
    <option value="" disabled selected>Select an ID</option>
    </select>
        <br>
        <label for="file">Pilih PDF Baru: </label>
        <input type="file" name="file" id="file" required>
        <br>
        <input type="submit" value="Edit PDF">
    </form>
    </div>
    <script>
            var select = document.getElementById("id");

// Generate options from 1500 to 2500 with increments of 100
for (var i = 1500; i <= 2500; i += 100) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    select.add(option);
}
    </script>
</body>
</html>
