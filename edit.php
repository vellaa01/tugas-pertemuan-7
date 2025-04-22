<?php
include 'koneksi.php';

if (isset($_GET['npm']) && isset($_GET['kodemk'])) {
    $npm = $_GET['npm'];
    $kodemk = $_GET['kodemk'];

    // Ambil data yang ada di database berdasarkan npm dan kodemk
    $query = $koneksi->query("SELECT * FROM krs WHERE mahasiswa_npm = '$npm' AND matakuliah_kodemk = '$kodemk'");
    $data = $query->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit KRS Mahasiswa</title>
</head>
<body>
    <h2>Edit Data KRS Mahasiswa</h2>
    <form method="post">
        NPM Mahasiswa: <input type="text" name="npm" value="<?php echo $data['mahasiswa_npm']; ?>" readonly><br><br>
        Kode Mata Kuliah: <input type="text" name="kodemk" value="<?php echo $data['matakuliah_kodemk']; ?>" readonly><br><br>
        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        // Data yang diupdate (misalnya, mengubah kode mata kuliah)
        $npm = $_POST['npm'];
        $kodemk = $_POST['kodemk'];

        // Update data di tabel krs (saat ini tidak ada data yang berubah, hanya menampilkan dan bisa menambah data)
        $koneksi->query("UPDATE krs SET matakuliah_kodemk='$kodemk' WHERE mahasiswa_npm='$npm'");

        echo "<p>Data berhasil diupdate. <a href='index.php'>Kembali ke daftar KRS</a></p>";
    }
    ?>
</body>
</html>