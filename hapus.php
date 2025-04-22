<?php
include 'koneksi.php';

if (isset($_GET['npm']) && isset($_GET['kodemk'])) {
    $npm = $_GET['npm'];
    $kodemk = $_GET['kodemk'];

    // Query untuk menghapus data berdasarkan npm dan kodemk
    $query = "DELETE FROM krs WHERE mahasiswa_npm = '$npm' AND matakuliah_kodemk = '$kodemk'";

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo "<p>Data berhasil dihapus. <a href='index.php'>Kembali ke daftar KRS</a></p>";
    } else {
        echo "<p>Gagal menghapus data. <a href='index.php'>Kembali ke daftar KRS</a></p>";
    }
}
?>