<?php
// Mulai sesi
session_start();

// Menampilkan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seminar";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses form login berdasarkan pilihan role
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];

    // Simpan peran dalam sesi
    $_SESSION['role'] = $role;

    if ($role == 'admin') {
        // Arahkan ke halaman admin
        header("Location: admin.php");
    } else {
        // Arahkan ke halaman registrasi peserta
        header("Location: registration.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Registration</title>
    
    <!-- Menyambungkan file CSS Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional: Tambahkan style.css untuk gaya tambahan -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Container Bootstrap -->
    <div class="container mt-5">
        <h1 class="text-center">Welcome to Seminar Registration</h1>
        <p class="lead text-center">Silakan pilih untuk masuk sebagai admin atau peserta.</p>

        <!-- Form Role Selection -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="role" class="form-label">Login as</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" disabled selected>Pilih peran Anda</option>
                            <option value="admin">Admin</option>
                            <option value="peserta">Peserta</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
