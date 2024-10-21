<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminar Registration</title>

    <!-- Menyambungkan file CSS Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional: Tambahkan style tambahan -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            padding: 30px;
        }
    </style>
</head>
<body>

<div class="container registration-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <h2 class="text-center mb-4">Seminar Registration Form</h2>

                <form action="registration.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="institution" class="form-label">Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter your institution" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="register" class="btn btn-primary btn-lg">Register Now</button>
                    </div>
                </form>

                <?php
                if (isset($_POST['register'])) {
                    $email = $_POST['email'];
                    $name = $_POST['name'];
                    $institution = $_POST['institution'];
                    $country = $_POST['country'];
                    $address = $_POST['address'];

                    $sql = "INSERT INTO peserta (email, name, institution, country, address) 
                            VALUES ('$email', '$name', '$institution', '$country', '$address')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success mt-3 text-center'>Registration successful!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3 text-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Menyambungkan file JS Bootstrap dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
