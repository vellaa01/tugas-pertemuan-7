<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        td:nth-child(4) {
            color: darkred;
        }
        td:nth-child(5) {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Data KRS Mahasiswa</h2>
    
    <!-- Tombol Tambah Data -->
    <a href="tambah.php"><button>+ Tambah Data</button></a>
    <br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Mata Kuliah</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        $sql = "SELECT m.nama AS nama_mahasiswa, mk.nama AS nama_matkul, mk.jumlah_sks, k.mahasiswa_npm, k.matakuliah_kodemk
                FROM krs k
                JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
                JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk";
        $query = $koneksi->query($sql);

        while($row = $query->fetch_assoc()) {
            echo "<tr>
                    <td>".$no++."</td>
                    <td>".$row['nama_mahasiswa']."</td>
                    <td>".$row['nama_matkul']."</td>
                    <td>".$row['nama_mahasiswa']." Mengambil Mata Kuliah ".$row['nama_matkul']." (".$row['jumlah_sks']." SKS)</td>
                    <td>
                        <a href='edit.php?npm=".$row['mahasiswa_npm']."&kodemk=".$row['matakuliah_kodemk']."'>Edit</a> |
                        <a href='hapus.php?npm=".$row['mahasiswa_npm']."&kodemk=".$row['matakuliah_kodemk']."' onclick='return confirm(\"Are you sure you want to delete this data?\")'>Hapus</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>