<?php
session_start();
require '../../includes/config.php';

// Security Check
if (!isset($_SESSION['sellerID'])) {
    header("Location: ../../login.php");
    exit();
}

$sellerID = $_SESSION['sellerID'];

if (isset($_GET['postid'])) {
    $postID = $conn->real_escape_string($_GET['postid']);
    
    // Fetch Post and verify ownership
    $sql = "SELECT * FROM post WHERE postID='$postID' AND sellerID='$sellerID'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        header("Location: seller.php");
        exit();
    }
} else {
    header("Location: seller.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Listing | Property Pro</title>
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
        body { background: var(--bg); display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 2rem; }
        .card { background: white; padding: 3rem; border-radius: 40px; box-shadow: 0 40px 100px rgba(0,0,0,0.05); width: 100%; max-width: 600px; border: 1px solid #f1f5f9; }
        h1 { font-size: 2rem; margin-bottom: 0.5rem; color: var(--primary); }
        p { color: #64748b; margin-bottom: 2.5rem; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; font-weight: 700; margin-bottom: 0.5rem; color: var(--primary); font-size: 0.9rem; }
        input, textarea, select { width: 100%; padding: 1.1rem; border: 2px solid #f1f5f9; border-radius: 18px; outline: none; transition: 0.3s; background: #f8fafc; font-size: 1rem; }
        input:focus, textarea:focus { border-color: var(--blue); background: white; }
        .btn-update { width: 100%; padding: 1.2rem; background: var(--blue); color: white; border: none; border-radius: 20px; font-weight: 700; font-size: 1.1rem; cursor: pointer; transition: 0.3s; margin-top: 1rem; }
        .btn-update:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(59,130,246,0.2); background: #2563eb; }
        .back-link { display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; color: #64748b; font-weight: 600; margin-bottom: 2rem; transition: 0.3s; }
        .back-link:hover { color: var(--blue); }
    </style>
</head>
<body>
    <div class="card">
        <a href="seller.php" class="back-link"><i class='bx bx-arrow-back'></i> Back to Dashboard</a>
        <h1>Edit Listing</h1>
        <p>Update your property details below.</p>

        <form method="POST" action="updatepost.php">
            <input type="hidden" name="postid" value="<?php echo $post['postID']; ?>">
            
            <div class="form-group">
                <label>Property Type</label>
                <select name="type">
                    <option value="House" <?php echo $post['type'] == 'House' ? 'selected' : ''; ?>>Residential House</option>
                    <option value="Land" <?php echo $post['type'] == 'Land' ? 'selected' : ''; ?>>Vacant Land</option>
                    <option value="Apartment" <?php echo $post['type'] == 'Apartment' ? 'selected' : ''; ?>>Modern Apartment</option>
                    <option value="Commercial" <?php echo $post['type'] == 'Commercial' ? 'selected' : ''; ?>>Commercial Space</option>
                </select>
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" value="<?php echo htmlspecialchars($post['location']); ?>" required>
            </div>

            <div class="form-group">
                <label>Price (LKR)</label>
                <input type="number" name="price" value="<?php echo $post['price']; ?>" required>
            </div>

            <div class="form-group">
                <label>Contact Number</label>
                <input type="tel" name="contact" value="<?php echo htmlspecialchars($post['contact']); ?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4" required><?php echo htmlspecialchars($post['description']); ?></textarea>
            </div>

            <button type="submit" class="btn-update">Save Changes</button>
        </form>
    </div>
</body>
</html>
