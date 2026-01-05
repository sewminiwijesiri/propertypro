<?php
require '../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postID = $_POST['postid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $contact=$_POST['contact'];

    // Update the post details in the database
    $sql = "UPDATE post SET type='$title', description='$description', location='$location', price='$price',contact='$contact' WHERE postID='$postID'";

    if ($conn->query($sql) === TRUE) {
        echo "Post updated successfully!";
    } else {
        echo "Error updating post: " . $conn->error;
    }

    // Redirect back to the seller dashboard
    header("Location: seller.php");
    exit();
}

$conn->close();
?>
