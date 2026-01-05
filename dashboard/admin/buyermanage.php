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
    <title>Buyer Management | Property Pro</title>
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
            <a href="sellermanage.php">
                <i class='bx bxs-store-alt'></i>
                <span>Sellers</span>
            </a>
            <a href="buyermanage.php" class="active">
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
            <h1>Buyer Management</h1>
            <p>View and manage all registered property buyers in the system.</p>
        </header>

        <div class="dashboard-section">
            <div class="section-head">
                <h2>Buyer Directory</h2>
            </div>

            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Buyer ID</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="buyerTable">
                        <?php
                        $sql = "SELECT buyerID, Name, Username, Email FROM buyer";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><span style='font-weight: 600; color: var(--emerald);'>#" . $row["buyerID"] . "</span></td>";
                                echo "<td>" . htmlspecialchars($row["Name"]) . "</td>";
                                echo "<td>@" . htmlspecialchars($row["Username"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["Email"]) . "</td>";
                                echo "<td style='text-align: right;'>";
                                echo "<div style='display: flex; gap: 8px; justify-content: flex-end;'>";
                                echo "<form action='Bmangedelet.php' method='POST' onsubmit='return confirm(\"Are you sure you want to remove this buyer?\")'>";
                                echo "<input type='hidden' name='buyerID' value='" . $row["buyerID"] . "'>";
                                echo "<button class='btn-icon btn-reject' type='submit' title='Remove Buyer'><i class='bx bx-trash'></i></button>";
                                echo "</form>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='text-align: center; padding: 3rem; color: var(--text-muted);'>No buyers found in the database.</td></tr>";
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

