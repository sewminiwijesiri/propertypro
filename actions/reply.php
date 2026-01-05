<?php
require '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = $_POST['message_id'];
    // Escape single quotes in the bot reply message to avoid SQL errors
    $bot_reply = mysqli_real_escape_string($conn, $_POST['bot_reply']);

    // Update the reply in the database
    $sql = "UPDATE messages SET bot_reply='$bot_reply', status='answered' WHERE id='$message_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../dashboard/admin/support.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

