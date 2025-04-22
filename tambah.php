<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah KRS Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data KRS Mahasiswa</h2>
    <form method="post">
        NPM Mahasiswa: <input type="text" name="npm" required><br><br>
        Kode Mata Kuliah: <input type="text" name="kodemk" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $npm = $_POST['npm'];
        $kodemk = $_POST['kodemk'];

        // Insert data ke tabel krs
        $koneksi->query("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");

        echo "<p>Data berhasil ditambahkan. <a href='index.php'>Kembali ke daftar KRS</a></p>";
    }
    ?>
</body>
</html>