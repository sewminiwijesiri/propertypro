<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . " | Property Pro" : "Property Pro | Premium Real Estate Platform"; ?></title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="<?php echo $baseUrl; ?>home.php" class="logo">Property<span>Pro</span></a>
        <ul class="nav-links">
            <li><a href="<?php echo $baseUrl; ?>home.php">Home</a></li>
            <li><a href="<?php echo $baseUrl; ?>property.php">Properties</a></li>
            <li><a href="<?php echo $baseUrl; ?>aboutus.php">Our Story</a></li>
            <li><a href="<?php echo $baseUrl; ?>contact.php">Contact Us</a></li>
        </ul>
        <div class="nav-btns">
            <a href="<?php echo $baseUrl; ?>login.php" title="Login"><i class='bx bx-user-circle'></i></a>
            <a href="<?php echo $baseUrl; ?>chatbox.php" title="Messages"><i class='bx bx-message-square-dots'></i></a>
        </div>
    </nav>
