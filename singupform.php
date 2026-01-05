

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
    $rpassword = $_POST['r-password'];
    $role = $_POST['role']; // Get the role (seller or buyer)

    if ($password == $rpassword) {
        // Password security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the correct database
        if ($role == "Seller") {
            $sql = "INSERT INTO seller (sellerID, name, username, email, contactno, password) 
                    VALUES ('', '$name', '$username', '$email', '$contact', '$hashed_password')";
        } else {
            $sql = "INSERT INTO buyer (buyerID, name, username, email, contactno, password) 
                    VALUES ('', '$name', '$username', '$email', '$contact', '$hashed_password')";
        }

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            // Registration successful, show alert and redirect to login page
            echo "<script>
                alert('Registration successful!');
                window.location.href='login.php';
            </script>";
            exit();
        } else {
            // Handle query failure
            echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href='signup.php';
            </script>";
            exit();
        }
    } else {
        // Password mismatch
        echo "<script>
            alert('Invalid password. Please try again.');
            window.location.href='signup.php';
        </script>";
        exit();
    }
}

$conn->close();
?>
