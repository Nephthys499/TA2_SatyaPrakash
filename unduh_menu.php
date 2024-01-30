<?php
require_once 'koneksi.php';

// Pastikan parameter pdf_id ada
if (isset($_POST['pdf_id'])) {
    $pdf_id = $_POST['pdf_id'];

    // Query menu berdasarkan id
    $query_menu = "SELECT berkas FROM menu WHERE id = $pdf_id";
    $result_menu = mysqli_query($sat, $query_menu);

    if ($result_menu->num_rows > 0) {
        $row_menu = mysqli_fetch_assoc($result_menu);

        // Ambil nama berkas
        $nama_berkas = $row_menu['berkas'];

        // Path menuju direktori tempat menyimpan file
        $lokasi_berkas = "path/to/pdf/directory/";

        // Path lengkap menuju berkas PDF
        $path_berkas = $lokasi_berkas . $nama_berkas;

        // Pastikan berkas ada
        if (file_exists($path_berkas)) {
            // Set header untuk mengizinkan unduhan PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($path_berkas) . '"');
            header('Content-Length: ' . filesize($path_berkas));

            // Baca dan tampilkan isi berkas PDF
            readfile($path_berkas);
        } else {
            echo "Berkas tidak ditemukan.";
        }
    } else {
        echo "Menu tidak ditemukan untuk ID yang diberikan.";
    }
} else {
    echo "ID tidak diberikan.";
}

// Menutup koneksi database
mysqli_close($sat);
?>
