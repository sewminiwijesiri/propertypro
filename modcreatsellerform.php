<?php
require 'includes/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO seller (sellerID, name, username, email, contactno, password) 
            VALUES ('', '$name', '$username', '$email', '$contact', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Registration successful!');
            window.location.href='mod.php';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Error: " . $conn->error . "');
            window.history.back();
        </script>";
    }
}

$conn->close();
?>
