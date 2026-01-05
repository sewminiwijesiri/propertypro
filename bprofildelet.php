<?php
session_start();  
require 'includes/config.php';  


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];


$sql = "DELETE FROM buyer WHERE Username = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    
    session_destroy();  
    header("Location: home.php");  
    exit();
} else {
    
    echo "Error deleting account: " . $conn->error;
}


$stmt->close();
$conn->close();
?>
