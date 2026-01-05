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
    <title>Seller Directory | Property Pro</title>
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
            <a href="modsellerviwe.php" class="active">
                <i class='bx bxs-store-alt'></i>
                <span>View Sellers</span>
            </a>
            <a href="modcreatsellers.php">
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
            <h1>Seller Directory</h1>
            <p>View complete details of all registered sellers in the system.</p>
        </header>

        <div class="dashboard-section">
            <div class="section-head">
                <h2>Active Sellers</h2>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Seller ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    <tbody id="sellerTable">
                        <?php
                        $sql = "SELECT sellerID, Name, Username, Email FROM seller";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><span style='font-weight: 600; color: var(--blue);'>#" . $row["sellerID"] . "</span></td>";
                                echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
                                echo "<td>@" . htmlspecialchars($row["Username"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["Email"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' style='text-align: center; padding: 3rem; color: var(--text-muted);'>No sellers found in the system.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php $conn->close(); ?>
</body>
</html>
