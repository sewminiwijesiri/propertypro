<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pId = $_POST['postid'];

    // Update the status to 'Approved' for the given postID
    $sql = "UPDATE post SET status = 'Approved' WHERE postID = '$pId'";

    if ($conn->query($sql) === TRUE) {
        // Using JavaScript for alert and then redirect
        echo "<script>
                alert('Post approved successfully');
                window.location.href = 'mod.php';
              </script>";
    } else {
        // Handling error and displaying it
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
