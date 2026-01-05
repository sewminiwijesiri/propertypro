<?php
session_start();
require '../../includes/config.php';

// Security Check
if (!isset($_SESSION['sellerID'])) {
    header("Location: ../../login.php");
    exit();
}

$sellerID = $_SESSION['sellerID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postid'])) {
    $postID = $conn->real_escape_string($_POST['postid']);
    $type = $conn->real_escape_string($_POST['type']);
    $description = $conn->real_escape_string($_POST['description']);
    $location = $conn->real_escape_string($_POST['location']);
    $price = $conn->real_escape_string($_POST['price']);
    $contact = $conn->real_escape_string($_POST['contact']);

    // Security check: Ensure this post belongs to the logged-in seller
    $sql = "UPDATE post SET 
            type = '$type', 
            description = '$description', 
            location = '$location', 
            price = '$price', 
            contact = '$contact',
            status = 'Pending' 
            WHERE postID = '$postID' AND sellerID = '$sellerID'";

    if ($conn->query($sql) === TRUE) {
        // Redirection with success message (simplified)
        header("Location: seller.php?updated=1");
    } else {
        echo "Error: " . $conn->error;
    }
    
    $conn->close();
    exit();
} else {
    header("Location: seller.php");
    exit();
}
?>
