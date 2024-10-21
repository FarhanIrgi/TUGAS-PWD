<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Soft delete, just update the `is_deleted` field
    $sql = "UPDATE peserta SET is_deleted = 1 WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
