<?php
require '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_message = $_POST['message'];

    $sql = "INSERT INTO messages (user_message, bot_reply, status) VALUES ('$user_message', '', 'unanswered')";
    if ($conn->query($sql) === TRUE) {
        header("Location: chatbox.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
