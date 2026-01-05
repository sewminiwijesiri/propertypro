<?php
session_start();
include '../../includes/config.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];


$sql = "SELECT buyerID, Name,Username,Email, ContactNo FROM buyer WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $buyer = $result->fetch_assoc(); 
} else {
    echo "No buyer found.";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="assets/css/buyer.css">
</head>

<body>
   
    <header>
        <div class="head">
            <h1>Property pro</h1>
        </div>
    </header>

    <section class="dashboard">
        <div class="profile">
            
        </div>
        <div class="user-info">
            <p>Buyer Id: <?php echo htmlspecialchars($buyer['buyerID']); ?></p>
            <p> Name: <?php echo htmlspecialchars($buyer['Name']); ?></p>
            <p>User Name: <?php echo htmlspecialchars($buyer['Username']); ?></p>
            <p>Email: <?php echo htmlspecialchars($buyer['Email']); ?></p>
            <p>Contact: <?php echo htmlspecialchars($buyer['ContactNo']); ?></p>
            
            <button > <a href="Bupdateform.php">Update</a></button>
            <form action="bprofildelet.php" method="POST" >
            <button type="submit" class="btn delete-btn">Delete</button>
            </form>
            <button><a href="../../home.php">logout</a></button>

        </div>
    </section>
</body>
</html>
