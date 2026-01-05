<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pId = $_POST['postid'];

       $sql = "DELETE FROM post WHERE postID = '$pId'";

    if ($conn->query($sql) === TRUE) {
        
        echo "<script>
                alert('Post removed successfully');
                window.location.href = 'mod.php';
              </script>";
    } else {
        
        echo "Error: " . $conn->error;
    }

    
    $conn->close();
}
?>
