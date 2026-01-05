<?php
session_start();

// Security Check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

require '../../includes/config.php';

// Initialize counts
$sellerCount = 0;
$buyerCount = 0;

// Handle Report Generation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate_report'])) {
    $sellerQuery = "SELECT COUNT(*) AS count FROM seller";
    $sellerResult = $conn->query($sellerQuery);
    if ($sellerResult) {
        $sellerRow = $sellerResult->fetch_assoc();
        $sellerCount = $sellerRow['count'];
    }

    $buyerQuery = "SELECT COUNT(*) AS count FROM buyer";
    $buyerResult = $conn->query($buyerQuery);
    if ($buyerResult) {
        $buyerRow = $buyerResult->fetch_assoc();
        $buyerCount = $buyerRow['count'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Property Pro</title>
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
            <a href="admin.php" class="active">
                <i class='bx bxs-dashboard'></i>
                <span>Overview</span>
            </a>
            <a href="sellermanage.php">
                <i class='bx bxs-store-alt'></i>
                <span>Sellers</span>
            </a>
            <a href="buyermanage.php">
                <i class='bx bxs-user-detail'></i>
                <span>Buyers</span>
            </a>
            <a href="Adcreatsellers.php">
                <i class='bx bxs-user-plus'></i>
                <span>Add Seller</span>
            </a>
            
            <a href="../../logout.php" class="logout-btn">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content-wrapper">
        <header class="dashboard-header">
            <h1>System Overview</h1>
            <p>Welcome back, Administrator. Here's what's happening today.</p>
        </header>

        <!-- Stats Section -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon sellers"><i class='bx bxs-store-alt'></i></div>
                <h3>Total Sellers</h3>
                <div class="value" id="sellerCount"><?php echo $sellerCount; ?></div>
                <form method="POST" style="margin-top: 1rem;">
                    <button type="submit" name="generate_report" class="btn-secondary">Update Stats</button>
                </form>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon buyers"><i class='bx bxs-group'></i></div>
                <h3>Total Buyers</h3>
                <div class="value" id="buyerCount"><?php echo $buyerCount; ?></div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class='bx bxs-home-circle'></i></div>
                <h3>Listed Properties</h3>
                <div class="value">24</div>
            </div>
        </section>

        <!-- Forms Section -->
        <div class="dashboard-section">
            <div class="section-head">
                <h2>Quick Actions</h2>
            </div>

            <div class="update-seller">
                <h3>Update Seller Details</h3>
                <p style="color: var(--text-muted); margin-bottom: 2rem;">Quickly modify seller information from the central directory.</p>
                
                <form method="POST" action="updatseller.php" class="form-grid">
                    <div class="input-block">
                        <label class="form-label" for="sellerID">Seller ID</label>
                        <input type="text" class="form-control" id="sellerID" name="sellerID" placeholder="e.g. SEL-001" required>
                    </div>

                    <div class="input-block">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                    </div>

                    <div class="input-block">
                        <label class="form-label" for="contact">Contact Number</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="+94 XX XXX XXXX" required>
                    </div>

                    <div class="input-block">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="seller@example.com" required>
                    </div>

                    <div class="input-block full" style="margin-top: 1rem;">
                        <button type="submit" name="update_seller" class="btn-primary">
                            <i class='bx bx-save' style="margin-right: 8px;"></i> Update Seller Record
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php $conn->close(); ?>
</body>
</html>

