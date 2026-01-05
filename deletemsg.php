<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = $_POST['message_id'];

    $sql = "DELETE FROM messages WHERE id='$message_id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: support.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
