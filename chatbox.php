
<?php
require 'includes/config.php';

$sql = "SELECT * FROM messages ORDER BY id";
$result = $conn->query($sql);
?>

<div class="chat-container">
    <h2>We are here to help...</h2> 
    <?php
    // Display messages
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='message-box'>";
            echo "<p><strong>User:</strong> " . $row['user_message'] . "</p>";
            echo "<p><strong>Supporter:</strong> " . $row['bot_reply'] . "</p>";
            echo "</div>";
        }
    }
    ?>
</div>

<div class="text-box">
    <form method="POST" action="sendmsg.php">
        <input type="text" name="message" placeholder="Type your message" required>
        <button type="submit">Send</button>
    </form>
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

.chat-container {
    width: 100%;
    max-width: 600px;
    background-color: rgba(255,255,255,0.5);
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    overflow-y: auto; /* Allows scrolling for long conversations */
    max-height: 400px; 
}

h2 {
    margin-bottom: 15px; 
    color: #333; 
    text-align: center; 
}

.message-box {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.text-box {
    display: flex;
    margin-top: 10px;
}

input[type="text"] {
    flex: 1; 
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px; 
}

button:hover {
    background-color: #45a049; 
}



</style>
