<?php
session_start();
require '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $role = $_POST['role']; 

    // SQL query based on user role
    if ($role == "Seller") {
        $sql = "SELECT sellerID, username, password FROM seller WHERE username = ?";
    } else {
        $sql = "SELECT buyerID, username, password FROM buyer WHERE username = ?";
    }

    // Prepare and execute the SQL statement
    if ($stmt = $conn->prepare($sql)) { 
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $stmt->store_result(); 

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userID, $dbUsername, $dbPassword);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $dbPassword)) {
                // Login successful
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                
                if ($role == "Seller") {
                    $_SESSION['sellerID'] = $userID;  // Set sellerID for sellers
                } else {
                    $_SESSION['buyerID'] = $userID;  // Set buyerID for buyers
                }

                echo "<script>
                    alert('Login successful!');
                    window.location.href='" . ($role == 'Seller' ? 'seller.php' : 'buyer.php') . "';
                </script>";
                exit();
            } else {
                // Invalid password
                echo "<script>
                    alert('Invalid password. Please try again.');
                    window.location.href='../login.php';
                </script>";
                exit();
            }
        } else {
            // No matching username
            echo "<script>
                alert('Invalid username. Please try again.');
                window.location.href='../login.php';
            </script>";
            exit();
        }
    } else {
        // Handle statement preparation error
        echo "<script>
            alert('Error preparing SQL statement.');
            window.location.href='../login.php';
        </script>";
        exit();
    }
}
?>
