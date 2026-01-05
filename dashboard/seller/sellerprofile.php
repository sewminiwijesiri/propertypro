<?php
session_start();
include '../../includes/config.php'; 

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];

// Fetch seller details from the database
$sql = "SELECT sellerID, Name, Username, Email, ContactNo FROM seller WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $seller = $result->fetch_assoc(); 
} else {
    echo "No seller found.";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <style>

.profile-container {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #555;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.profile-container h2 {
    text-align: center;
}

.profile-container p {
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #b4afaf;
    margin: 40px;
    padding: 10px;
}

</style>
    
</head>
<body>
        <div class="profile-container">
            <h2>Seller Profile</h2>
            <p><strong>Seller ID:</strong> <?php echo htmlspecialchars($seller['sellerID']); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($seller['Name']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($seller['Username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($seller['Email']); ?></p>
            <p><strong>Contact:</strong> <?php echo htmlspecialchars($seller['ContactNo']); ?></p>
            

        </div>
</body>
</html>
