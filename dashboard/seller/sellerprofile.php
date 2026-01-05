<?php
session_start();
require '../../includes/config.php';

// Security Check
if (!isset($_SESSION['sellerID'])) {
    header("Location: ../../login.php");
    exit();
}

$sellerID = $_SESSION['sellerID'];

// Fetch seller details from the database
$sql = "SELECT sellerID, Name, Username, Email, ContactNo FROM seller WHERE sellerID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sellerID);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $seller = $result->fetch_assoc(); 
} else {
    echo "No seller found.";
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');
        :root {
            --primary: #0f172a;
            --blue: #3b82f6;
            --white: #ffffff;
            --bg: #f8fafc;
        }
        * { margin:0; padding:0; box-sizing: border-box; font-family: 'Outfit', sans-serif; }
        body { background: var(--bg); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem; }
        .card { background: white; padding: 3rem; border-radius: 40px; box-shadow: 0 40px 100px rgba(0,0,0,0.05); width: 100%; max-width: 500px; border: 1px solid #f1f5f9; text-align: center; }
        .avatar-large { width: 100px; height: 100px; background: var(--blue); color: white; border-radius: 30px; display: flex; align-items: center; justify-content: center; font-size: 3rem; margin: 0 auto 2rem; box-shadow: 0 20px 40px rgba(59,130,246,0.2); }
        h1 { font-size: 1.8rem; margin-bottom: 0.5rem; color: var(--primary); }
        .seller-id { display: inline-block; background: #dbeafe; color: var(--blue); padding: 4px 12px; border-radius: 50px; font-weight: 700; font-size: 0.8rem; margin-bottom: 2rem; }
        .info-list { text-align: left; margin-top: 1rem; }
        .info-item { display: flex; align-items: center; gap: 1rem; padding: 1.2rem; background: #f8fafc; border-radius: 20px; margin-bottom: 1rem; border: 1px solid #f1f5f9; }
        .info-item i { font-size: 1.4rem; color: var(--blue); }
        .info-label { font-size: 0.75rem; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        .info-value { font-size: 1rem; color: var(--primary); font-weight: 600; }
        .back-btn { display: inline-flex; align-items: center; gap: 0.5rem; margin-top: 2rem; color: #64748b; text-decoration: none; font-weight: 600; transition: 0.3s; }
        .back-btn:hover { color: var(--blue); }
    </style>
</head>
<body>
    <div class="card">
        <div class="avatar-large"><i class='bx bxs-user'></i></div>
        <h1><?php echo htmlspecialchars($seller['Name']); ?></h1>
        <span class="seller-id">Verified Seller #<?php echo htmlspecialchars($seller['sellerID']); ?></span>

        <div class="info-list">
            <div class="info-item">
                <i class='bx bx-at'></i>
                <div>
                    <p class="info-label">Username</p>
                    <p class="info-value">@<?php echo htmlspecialchars($seller['Username']); ?></p>
                </div>
            </div>
            <div class="info-item">
                <i class='bx bx-envelope'></i>
                <div>
                    <p class="info-label">Email Address</p>
                    <p class="info-value"><?php echo htmlspecialchars($seller['Email']); ?></p>
                </div>
            </div>
            <div class="info-item">
                <i class='bx bx-phone'></i>
                <div>
                    <p class="info-label">Contact Number</p>
                    <p class="info-value"><?php echo htmlspecialchars($seller['ContactNo']); ?></p>
                </div>
            </div>
        </div>

        <a href="seller.php" class="back-btn"><i class='bx bx-arrow-back'></i> Return to Dashboard</a>
    </div>
</body>
</html>
