<?php
session_start();

// Security Check
if (!isset($_SESSION['moderator_logged_in']) || $_SESSION['moderator_logged_in'] !== true) {
    header("Location: ../admin/adminlogin.php");
    exit();
}

require '../../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Seller | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>
<body>

    <!-- Sidebar -->
    <aside class="manage-sidebar">
        <div class="logo-area">
            <h1>Property<span>Pro</span></h1>
        </div>
        
        <nav class="nav-links">
            <a href="mod.php">
                <i class='bx bxs-dashboard'></i>
                <span>Review Center</span>
            </a>
            <a href="modsellerviwe.php">
                <i class='bx bxs-store-alt'></i>
                <span>View Sellers</span>
            </a>
            <a href="modcreatsellers.php" class="active">
                <i class='bx bxs-user-plus'></i>
                <span>Add Seller</span>
            </a>
            
            <a href="../../login.php" class="logout-btn">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content-wrapper">
        <header class="dashboard-header">
            <h1>Onboard New Seller</h1>
            <p>Manually register a new property seller into the Property Pro ecosystem.</p>
        </header>

        <div class="dashboard-section" style="max-width: 800px;">
            <div class="section-head">
                <h2>Seller Account Details</h2>
            </div>
            
            <form action="modcreatsellerform.php" method="POST" class="form-grid">
                <div class="input-block">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                </div>

                <div class="input-block">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="john_doe" required>
                </div>

                <div class="input-block">
                    <label class="form-label" for="contact">Contact Number</label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="+94 XX XXX XXXX" required>
                </div>

                <div class="input-block">
                    <label class="form-label" for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="seller@example.com" required>
                </div>

                <div class="input-block full">
                    <label class="form-label" for="password">Initial Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.5rem;">The seller will be able to change this password after their first login.</p>
                </div>

                <div class="input-block full" style="margin-top: 1.5rem;">
                    <button type="submit" class="btn-primary">
                        <i class='bx bx-user-plus' style="margin-right: 8px;"></i> Create Seller Account
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php $conn->close(); ?>
</body>
</html>
