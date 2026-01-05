
<?php
require 'includes/config.php';
$sql = "SELECT * FROM messages ORDER BY id";
$result = $conn->query($sql);

$pageTitle = "Help Center";
$baseUrl = "./";
include 'includes/header.php';
?>

<style>
    body { padding-top: 100px; background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); }
    .chat-wrapper {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }
    .chat-container {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 30px;
        padding: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
        max-height: 500px;
        overflow-y: auto;
    }
    .chat-container h2 {
        text-align: center;
        margin-bottom: 2rem;
        color: var(--primary);
    }
    .message-box {
        background: white;
        padding: 1.2rem;
        border-radius: 20px;
        margin-bottom: 1rem;
        border: 1px solid #f1f5f9;
    }
    .message-box p { margin-bottom: 0.5rem; }
    .message-box strong { color: var(--blue); }
    
    .text-box {
        background: white;
        padding: 1rem;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        display: flex;
        gap: 1rem;
    }
    .text-box input {
        flex: 1;
        border: none;
        outline: none;
        padding: 0 1rem;
        font-size: 1rem;
    }
    .text-box button {
        background: var(--blue);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
    }
    .text-box button:hover { background: #2563eb; transform: scale(1.02); }
</style>

<div class="chat-wrapper">
    <div class="chat-container">
        <h2>We are here to help...</h2> 
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class='message-box'>
                    <p><strong>User:</strong> <?php echo htmlspecialchars($row['user_message']); ?></p>
                    <p><strong>Supporter:</strong> <?php echo htmlspecialchars($row['bot_reply']); ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p style='text-align:center; color: var(--slate);'>No messages yet. Start a conversation!</p>";
        }
        ?>
    </div>

    <div class="text-box">
        <form method="POST" action="actions/sendmsg.php" style="display:contents;">
            <input type="text" name="message" placeholder="Type your message" required>
            <button type="submit">Send</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

