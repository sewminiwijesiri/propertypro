

<?php
require '../includes/config.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['Name']);
    $username = $conn->real_escape_string($_POST['Username']);
    $contact = $conn->real_escape_string($_POST['ContactNo']);
    $email = $conn->real_escape_string($_POST['Email']);
    $password = $_POST['Password'];
    $rpassword = $_POST['RePassword'];
    $role = $_POST['role']; // Get the role (seller or buyer)

    if ($password == $rpassword) {
        // Password security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the correct database using prepared statements
        if ($role == "Seller") {
            $stmt = $conn->prepare("INSERT INTO seller (sellerID, Name, Username, Email, ContactNo, Password) VALUES ('', ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $username, $email, $contact, $hashed_password);
        } else {
            $stmt = $conn->prepare("INSERT INTO buyer (buyerID, Name, Username, Email, ContactNo, Password) VALUES ('', ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $username, $email, $contact, $hashed_password);
        }

        // Check if the query was successful
        if ($stmt->execute()) {
            // Registration successful, show alert and redirect to login page
            echo "<script>
                alert('Registration successful!');
                window.location.href='../login.php';
            </script>";
            $stmt->close();
            exit();
        } else {
            // Handle query failure
            echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href='../signup.php';
            </script>";
            $stmt->close();
            exit();
        }
    } else {
        // Password mismatch
        echo "<script>
            alert('Invalid password. Please try again.');
            window.location.href='../signup.php';
        </script>";
        exit();
    }
}

$conn->close();
?>
