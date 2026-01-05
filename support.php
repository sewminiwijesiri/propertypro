
<?php
require 'includes/config.php';

$sql = "SELECT * FROM messages ORDER BY id";
$result = $conn->query($sql);
?>

<div class="chat-container">
    <h2>Customer Service Dashboard</h2>
    <?php
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='message-box'>";
            echo "<p><strong>User:</strong> " . $row['user_message'] . "</p>";
            echo "<form method='POST' action='reply.php'>";
            echo "<input type='hidden' name='message_id' value='" . $row['id'] . "'>";
            echo "<input type='text' name='bot_reply' placeholder='Type your reply' required>";
            echo "<button type='submit'>Reply</button>";
            echo "</form>";

            // Delete button
            echo "<form method='POST' action='deletemsg.php'>";
            echo "<input type='hidden' name='message_id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No messages to display.</p>";
    }
    ?>
</div>



<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-image: url(Images/back2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Chat container */
.chat-container {
    width: 100%;
    max-width: 600px;
    background-color: rgba(255,255,255,0.5);
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    overflow-y: auto; /* Allows scrolling for long conversations */
    max-height: 400px; /* Limits height for better UI */
}

/* Heading */
h2 {
    margin-bottom: 15px; /* Space below the heading */
    color: #333; /* Darker color for better visibility */
    text-align: center; /* Center the heading */
}

/* Message boxes */
.message-box {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

/* Text box for input */
input[type="text"] {
    flex: 1; /* Takes available space */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 5px 0; /* Space above and below the input */
}

/* Send and Delete button */
button {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px; /* Space between input and button */
}

button:hover {
    background-color: #45a049; /* Darker shade on hover */
}

/* Delete button specific styling */
form {
    display: inline; /* Display inline to keep buttons in the same line */
}

form button {
    background-color: #f44336; /* Red color for delete button */
}

form button:hover {
    background-color: #e53935; /* Darker shade on hover for delete button */
}


</style>
