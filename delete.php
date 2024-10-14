<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prakweb2024_d_223040065";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql_delete = "DELETE FROM inibuku WHERE id=$id";

if ($conn->query($sql_delete) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql_delete . "<br>" . $conn->error;
}

$conn->close();
?>
