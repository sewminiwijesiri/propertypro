<?php
require '../../includes/config.php';
$sql = "SELECT * FROM messages ORDER BY id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Management | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');
        :root { --primary: #0f172a; --blue: #3b82f6; --slate: #64748b; --bg: #f8fafc; }
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Outfit',sans-serif; }
        body { background: var(--bg); padding: 4rem 2rem; }
        .support-wrapper { max-width: 900px; margin: 0 auto; }
        h2 { margin-bottom: 2rem; color: var(--primary); text-align: center; font-size: 2.5rem; }
        .message-box {
            background: white;
            padding: 2rem;
            border-radius: 25px;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            border: 1px solid #f1f5f9;
        }
        .message-box p { margin-bottom: 1rem; font-size: 1.1rem; }
        .message-box strong { color: var(--blue); }
        .reply-form { display: flex; gap: 1rem; margin-bottom: 1rem; }
        .reply-form input {
            flex: 1;
            padding: 1rem;
            border: 2px solid #f1f5f9;
            border-radius: 15px;
            outline: none;
            transition: 0.3s;
        }
        .reply-form input:focus { border-color: var(--blue); }
        button {
            padding: 0.8rem 1.5rem;
            border-radius: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }
        .btn-reply { background: var(--blue); color: white; }
        .btn-delete { background: #ef4444; color: white; margin-top: 0.5rem; }
        button:hover { opacity: 0.9; transform: translateY(-2px); }
        .back-link { display: inline-block; margin-bottom: 2rem; color: var(--slate); text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="support-wrapper">
        <a href="admin.php" class="back-link"><i class='bx bx-left-arrow-alt'></i> Back to Admin Dashboard</a>
        <h2>Support Desk</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class='message-box'>
                    <p><strong>User:</strong> <?php echo htmlspecialchars($row['user_message']); ?></p>
                    <form method='POST' action='../../actions/reply.php' class="reply-form">
                        <input type='hidden' name='message_id' value='<?php echo $row['id']; ?>'>
                        <input type='text' name='bot_reply' placeholder='Type your reply' required>
                        <button type='submit' class="btn-reply">Reply</button>
                    </form>

                    <form method='POST' action='deletemsg.php'>
                        <input type='hidden' name='message_id' value='<?php echo $row['id']; ?>'>
                        <button type='submit' class="btn-delete">Delete Message</button>
                    </form>
                </div>
                <?php
            }
        } else {
            echo "<div class='message-box' style='text-align:center;'><p>No active support tickets.</p></div>";
        }
        ?>
    </div>
</body>
</html>

