<?php
$servername = "localhost";  
$username = "root";        
$password = "";             
$dbname = "prakweb2024_d_223040065";    

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, judul_buku, pengarang, tahun_terbit FROM inibuku";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Daftar Buku</h2>

    <!-- Tabel Daftar Buku -->
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["judul_buku"] . "</td>";
                            echo "<td>" . $row["pengarang"] . "</td>";
                            echo "<td>" . $row["tahun_terbit"] . "</td>";
                            echo "<td>";
                                echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                                echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin?\")'>Hapus</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
            }
        ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-primary">Tambah Buku Baru</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>