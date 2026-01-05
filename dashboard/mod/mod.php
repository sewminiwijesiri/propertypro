<?php
session_start();

// Security Check
if (!isset($_SESSION['moderator_logged_in']) || $_SESSION['moderator_logged_in'] !== true) {
    header("Location: ../admin/adminlogin.php");
    exit();
}

require '../../includes/config.php';

// Fetch Total Posts Count
$totalPostsCount = 0;
$countSql = "SELECT count(*) AS totalPost FROM post";
$countResult = $conn->query($countSql);
if ($countResult && $row = $countResult->fetch_assoc()) {
    $totalPostsCount = $row['totalPost'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Dashboard | Property Pro</title>
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
            <a href="mod.php" class="active">
                <i class='bx bxs-dashboard'></i>
                <span>Review Center</span>
            </a>
            <a href="modsellerviwe.php">
                <i class='bx bxs-store-alt'></i>
                <span>View Sellers</span>
            </a>
            <a href="modcreatsellers.php">
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
            <h1>Moderator Review Center</h1>
            <p>Approve or remove property listings to maintain quality and security.</p>
        </header>

        <!-- Stats Section -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--blue);">
                    <i class='bx bxs-news'></i>
                </div>
                <h3>System Database</h3>
                <div class="value"><?php echo $totalPostsCount; ?></div>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-top: 5px;">Total posts in system</p>
            </div>
        </section>

        <!-- Listings Section -->
        <div class="dashboard-section">
            <div class="section-head">
                <h2>Pending Approvals</h2>
            </div>

            <?php
            $sql = "SELECT postID, img, type, description, location, price, contact FROM post WHERE status = 'Pending'";
            $result = $conn->query($sql);
            
            if ($result && $result->num_rows > 0) {
                echo "<div class='posts-grid'>";
                while($row = $result->fetch_assoc()) {
                    ?>
                    <article class="post-card">
                        <div class="post-media">
                            <span class="post-badge">Pending Approval</span>
                            <img src="<?php echo $row['img'] ? '../seller/' . htmlspecialchars($row['img']) : '../../assets/images/placeholder.jpg'; ?>" alt="Listing">
                        </div>
                        
                        <div class="post-info">
                            <h3><?php echo htmlspecialchars($row['type']); ?></h3>
                            <div class="post-meta">
                                <div class="meta-item">
                                    <i class='bx bxs-location-plus'></i>
                                    <span><?php echo htmlspecialchars($row['location']); ?></span>
                                </div>
                                <div class="meta-item">
                                    <i class='bx bxs-phone'></i>
                                    <span><?php echo htmlspecialchars($row['contact']); ?></span>
                                </div>
                            </div>
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                            <div class="price-tag">LKR <?php echo number_format($row['price']); ?></div>
                        </div>

                        <div class="post-actions">
                            <form method='POST' action='approve.php' style="flex: 2;">
                                <input type='hidden' name='postid' value='<?php echo $row['postID']; ?>'>
                                <button class="btn-approve" type="submit">
                                    <i class='bx bx-check-circle'></i> Approve
                                </button>
                            </form>
                            
                            <form method='POST' action='remove.php' style="flex: 1;">
                                <input type='hidden' name='postid' value='<?php echo $row['postID']; ?>'>
                                <button class="btn-delete-action" type="submit" onclick="return confirm('Are you sure you want to remove this post?')">
                                    <i class='bx bx-x'></i>
                                </button>
                            </form>
                        </div>
                    </article>
                    <?php
                }
                echo "</div>";
            } else {
                echo "
                <div style='text-align: center; padding: 5rem; background: #fafafa; border-radius: 20px;'>
                    <i class='bx bx-check-double' style='font-size: 4rem; color: var(--emerald); margin-bottom: 1rem;'></i>
                    <h3>All Caught Up!</h3>
                    <p style='color: var(--text-muted);'>There are no pending posts for approval at the moment.</p>
                </div>";
            }
            ?>
        </div>
    </main>

    <?php $conn->close(); ?>
</body>
</html>
