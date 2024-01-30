<?php
// Pastikan file yang akan diunduh ada
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // Lokasi direktori file PDF
    $file_path = "path/to/pdf/directory/" . $file;

    // Pastikan file ada sebelum diunduh
    if (file_exists($file_path)) {
        // Tentukan header untuk file PDF
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename=' . basename($file_path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        die('File tidak ditemukan.');
    }
} else {
    die('Permintaan tidak valid.');
}
?>
