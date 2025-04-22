<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="post">
        NPM: <input type="text" name="npm" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        Jurusan:
        <select name="jurusan" required>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <!-- Tambahkan pilihan jurusan lainnya jika diperlukan -->
        </select><br><br>
        Alamat: <textarea name="alamat" required></textarea><br><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        // Query untuk memasukkan data mahasiswa ke tabel mahasiswa
        $koneksi->query("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')");

        echo "<p>Data mahasiswa berhasil ditambahkan. <a href='index.php'>Kembali ke daftar mahasiswa</a></p>";
    }
    ?>
</body>
</html>