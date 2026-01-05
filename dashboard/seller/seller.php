<?php
session_start();
require '../../includes/config.php';

// Security Check
if (!isset($_SESSION['sellerID'])) {
    header("Location: ../../login.php");
    exit();
}

$sellerID = $_SESSION['sellerID'];

// Fetch Seller Name
$sellerName = "Seller";
$nameSql = "SELECT Name FROM seller WHERE sellerID = '$sellerID'";
$nameResult = $conn->query($nameSql);
if ($nameResult && $row = $nameResult->fetch_assoc()) {
    $sellerName = $row['Name'];
}

// Fetch Stats
$activeListings = 0;
$totalRevenue = 0;
$pendingApprovals = 0;

// Active Listings (Approved)
$activeSql = "SELECT count(*) as total FROM post WHERE sellerID = '$sellerID' AND status = 'Approved'";
$activeRes = $conn->query($activeSql);
if ($activeRes) $activeListings = $activeRes->fetch_assoc()['total'];

// Total Revenue (Sum of approved prices - simplified for demo)
$revSql = "SELECT sum(price) as total FROM post WHERE sellerID = '$sellerID' AND status = 'Approved'";
$revRes = $conn->query($revSql);
if ($revRes) $totalRevenue = $revRes->fetch_assoc()['total'] ?? 0;

// Pending Reviews
$pendSql = "SELECT count(*) as total FROM post WHERE sellerID = '$sellerID' AND status = 'Pending'";
$pendRes = $conn->query($pendSql);
if ($pendRes) $pendingApprovals = $pendRes->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #0f172a;
            --blue: #3b82f6;
            --emerald: #10b981;
            --slate: #64748b;
            --white: #ffffff;
            --bg: #f8fafc;
            --sidebar-width: 280px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--primary);
            color: white;
            padding: 2.5rem 1.5rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 4rem;
            text-decoration: none;
            color: white;
            text-align: center;
        }

        .logo span {
            color: var(--blue);
        }

        .nav-menu {
            list-style: none;
            flex: 1;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem;
            text-decoration: none;
            color: #94a3b8;
            border-radius: 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
        }

        .nav-link i {
            font-size: 1.5rem;
        }

        .logout-btn {
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem;
            color: #ef4444;
            text-decoration: none;
            font-weight: 700;
            border-radius: 15px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 3rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 2.2rem;
            color: var(--primary);
        }

        .user-pill {
            background: white;
            padding: 0.6rem 1.2rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
        }

        .user-pill .avatar {
            width: 35px;
            height: 35px;
            background: var(--blue);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Dashboard Overview */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3.5rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .stat-info p {
            color: var(--slate);
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 2px;
        }

        /* Listing Form */
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 35px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f5f9;
        }

        .card h2 {
            margin-bottom: 2rem;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }

        .form-group label {
            font-weight: 700;
            color: var(--primary);
            font-size: 0.9rem;
            margin-left: 0.5rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 1.1rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 18px;
            outline: none;
            transition: 0.3s;
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: var(--blue);
            background: white;
        }

        .submit-btn {
            margin-top: 2rem;
            background: var(--blue);
            color: white;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #2563eb;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="../../home.php" class="logo">Property<span>Pro</span></a>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#" class="nav-link active"><i class='bx bxs-dashboard'></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class='bx bxs-home-circle'></i> My Listings</a>
            </li>
            <li class="nav-item">
                <a href="../../chatbox.php" class="nav-link"><i class='bx bxs-message-dots'></i> Shared Messages</a>
            </li>
            <li class="nav-item">
                <a href="sellerprofile.php" class="nav-link"><i class='bx bxs-user-detail'></i> Profile</a>
            </li>
        </ul>

        <a href="../../logout.php" class="logout-btn"><i class='bx bx-log-out'></i> Log Out</a>
    </div>

    <div class="main-content">
        <header class="header">
            <div>
                <h1>Hello, <?php echo htmlspecialchars($sellerName); ?>!</h1>
                <p style="color: var(--slate); font-weight: 500;">Manage your property portfolio here.</p>
            </div>
            <div class="user-pill">
                <div class="avatar"><i class='bx bxs-user'></i></div>
                <span>Seller Account</span>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--blue);">
                    <i class='bx bxs-home-circle'></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $activeListings; ?></h3>
                    <p>Live Listings</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--emerald);">
                    <i class='bx bxs-check-shield'></i>
                </div>
                <div class="stat-info">
                    <h3>LKR <?php echo number_format($totalRevenue / 1000000, 1); ?>M</h3>
                    <p>Portfolio Value</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                    <i class='bx bxs-time-five'></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $pendingApprovals; ?></h3>
                    <p>Pending Review</p>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Create New Property Listing</h2>
            <form action="sellerpost.php" method="POST" enctype="multipart/form-data">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Property Category</label>
                        <select name="type">
                            <option value="House">Residential House</option>
                            <option value="Land">Vacant Land</option>
                            <option value="Apartment">Modern Apartment</option>
                            <option value="Commercial">Commercial Space</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Exact Location</label>
                        <input type="text" name="location" placeholder="e.g. Kandy, Colombo 7" required>
                    </div>
                    <div class="form-group">
                        <label>Price (LKR)</label>
                        <input type="number" name="price" placeholder="45,000,000" required>
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="contact" placeholder="077 123 4567" required>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Property Description</label>
                        <textarea name="description" rows="5"
                            placeholder="Tell buyers about the unique features of your property..."></textarea>
                    </div>
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Property Image</label>
                        <input type="file" name="img" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" class="submit-btn" name="submit">Scale Listing live</button>
            </form>
        </div>
        <div class="card" style="margin-top: 3rem;">
            <h2>Your Property Listings</h2>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #f1f5f9;">
                            <th style="padding: 1rem;">Preview</th>
                            <th style="padding: 1rem;">Type</th>
                            <th style="padding: 1rem;">Location</th>
                            <th style="padding: 1rem;">Price</th>
                            <th style="padding: 1rem;">Status</th>
                            <th style="padding: 1rem;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $listSql = "SELECT * FROM post WHERE sellerID = '$sellerID' ORDER BY postID DESC";
                        $listRes = $conn->query($listSql);
                        if ($listRes && $listRes->num_rows > 0) {
                            while($item = $listRes->fetch_assoc()) {
                                $statusClass = $item['status'] == 'Approved' ? 'badge-success' : ($item['status'] == 'Rejected' ? 'badge-danger' : 'badge-pending');
                                ?>
                                <tr style="border-bottom: 1px solid #f8fafc;">
                                    <td style="padding: 1rem;">
                                        <img src="<?php echo htmlspecialchars($item['img']); ?>" style="width: 60px; height: 45px; object-fit: cover; border-radius: 8px;">
                                    </td>
                                    <td style="padding: 1rem; font-weight: 600;"><?php echo htmlspecialchars($item['type']); ?></td>
                                    <td style="padding: 1rem; color: var(--slate);"><?php echo htmlspecialchars($item['location']); ?></td>
                                    <td style="padding: 1rem; font-weight: 700;">LKR <?php echo number_format($item['price']); ?></td>
                                    <td style="padding: 1rem;">
                                        <span class="badge <?php echo $statusClass; ?>"><?php echo $item['status']; ?></span>
                                    </td>
                                    <td style="padding: 1rem; display: flex; gap: 0.5rem;">
                                        <a href="editpost.php?postid=<?php echo $item['postID']; ?>" style="background: #dbeafe; color: #2563eb; border: none; padding: 0.5rem; border-radius: 8px; cursor: pointer; text-decoration: none; display: flex; align-items: center;">
                                            <i class='bx bx-edit-alt'></i>
                                        </a>
                                        <form action="deletepost.php" method="POST" onsubmit="return confirm('Delete this property?')">
                                            <input type="hidden" name="postid" value="<?php echo $item['postID']; ?>">
                                            <button type="submit" style="background: #fee2e2; color: #ef4444; border: none; padding: 0.5rem; border-radius: 8px; cursor: pointer;">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' style='padding: 3rem; text-align: center; color: var(--slate);'>You haven't posted any properties yet.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Additional Styles for Table Badges -->
    <style>
        .badge {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge-success { background: #dcfce7; color: #166534; }
        .badge-pending { background: #fef9c3; color: #854d0e; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
    </style>
</body>
</html>
