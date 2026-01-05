<?php
session_start();

// Security Check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}

require '../../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Management | Property Pro</title>
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
            <a href="admin.php">
                <i class='bx bxs-dashboard'></i>
                <span>Overview</span>
            </a>
            <a href="sellermanage.php" class="active">
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
            
            <a href="../../login.php" class="logout-btn">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content-wrapper">
        <header class="dashboard-header">
            <h1>Seller Management</h1>
            <p>Monitor and manage all registered property sellers in the system.</p>
        </header>

        <div class="dashboard-section">
            <div class="section-head">
                <h2>Seller Directory</h2>
                <div class="actions">
                    <a href="Adcreatsellers.php" class="btn-secondary">
                        <i class='bx bx-plus'></i> Add New Seller
                    </a>
                </div>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Seller ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th style="text-align: right;">Actions</th>
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
                                echo "<td style='text-align: right;'>";
                                echo "<div style='display: flex; gap: 8px; justify-content: flex-end;'>";
                                echo "<form action='sellermanagedelete.php' method='POST' onsubmit='return confirm(\"Are you sure you want to remove this seller?\")'>";
                                echo "<input type='hidden' name='sellerID' value='" . $row["sellerID"] . "'>";
                                echo "<button class='btn-icon btn-reject' type='submit' title='Remove Seller'><i class='bx bx-trash'></i></button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='text-align: center; padding: 3rem; color: var(--text-muted);'>No sellers found in the database.</td></tr>";
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

