<?php
session_start();
require '../../includes/config.php';

// Security Check
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php");
    exit();
}

$username = $_SESSION['username'];
$buyerID = $_SESSION['buyerID'] ?? null;

// Fetch Buyer Details
$sql = "SELECT buyerID, Name, Username, Email, ContactNo FROM buyer WHERE Username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $buyer = $result->fetch_assoc();
    $buyerID = $buyer['buyerID'];
} else {
    echo "No buyer found.";
    exit();
}

// Fetch Buyer Stats
$savedProperties = 0;
$totalInquiries = 0;
$recentViews = 0;

// Count saved/favorite properties (if you have a favorites table)
// For now, we'll use placeholder values
$savedProperties = 0;
$totalInquiries = 0;
$recentViews = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #0f172a;
            --blue: #3b82f6;
            --emerald: #10b981;
            --purple: #8b5cf6;
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
            background: var(--purple);
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
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
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

        /* Profile Card */
        .card {
            background: white;
            padding: 2.5rem;
            border-radius: 35px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f5f9;
            margin-bottom: 2rem;
        }

        .card h2 {
            margin-bottom: 2rem;
            color: var(--primary);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .profile-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .profile-item label {
            font-weight: 700;
            color: var(--slate);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-item .value {
            font-size: 1.1rem;
            color: var(--primary);
            font-weight: 600;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--blue);
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        .btn-danger {
            background: #fee2e2;
            color: #ef4444;
        }

        .btn-danger:hover {
            background: #ef4444;
            color: white;
        }

        /* Recent Properties */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .property-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            border: 1px solid #f1f5f9;
            transition: 0.3s;
        }

        .property-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .property-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .property-info {
            padding: 1.5rem;
        }

        .property-type {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }

        .property-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .property-location {
            color: var(--slate);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .profile-grid {
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

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--slate);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .empty-state p {
            margin-bottom: 2rem;
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
                <a href="../../property.php" class="nav-link"><i class='bx bxs-search'></i> Browse Properties</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class='bx bxs-heart'></i> Saved Properties</a>
            </li>
            <li class="nav-item">
                <a href="../../chatbox.php" class="nav-link"><i class='bx bxs-message-dots'></i> Messages</a>
            </li>
            <li class="nav-item">
                <a href="#profile" class="nav-link"><i class='bx bxs-user-detail'></i> My Profile</a>
            </li>
        </ul>

        <a href="../../logout.php" class="logout-btn"><i class='bx bx-log-out'></i> Log Out</a>
    </div>

    <div class="main-content">
        <header class="header">
            <div>
                <h1>Welcome, <?php echo htmlspecialchars($buyer['Name']); ?>! 👋</h1>
                <p style="color: var(--slate); font-weight: 500;">Find your dream property today</p>
            </div>
            <div class="user-pill">
                <div class="avatar"><i class='bx bxs-user'></i></div>
                <span>Buyer Account</span>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: var(--purple);">
                    <i class='bx bxs-heart'></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $savedProperties; ?></h3>
                    <p>Saved Properties</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: var(--blue);">
                    <i class='bx bxs-message-dots'></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $totalInquiries; ?></h3>
                    <p>Active Inquiries</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--emerald);">
                    <i class='bx bxs-show'></i>
                </div>
                <div class="stat-info">
                    <h3><?php echo $recentViews; ?></h3>
                    <p>Recent Views</p>
                </div>
            </div>
        </div>

        <div class="card" id="profile">
            <h2><i class='bx bxs-user-circle'></i> My Profile</h2>
            <div class="profile-grid">
                <div class="profile-item">
                    <label>Buyer ID</label>
                    <div class="value"><?php echo htmlspecialchars($buyer['buyerID']); ?></div>
                </div>
                <div class="profile-item">
                    <label>Full Name</label>
                    <div class="value"><?php echo htmlspecialchars($buyer['Name']); ?></div>
                </div>
                <div class="profile-item">
                    <label>Username</label>
                    <div class="value"><?php echo htmlspecialchars($buyer['Username']); ?></div>
                </div>
                <div class="profile-item">
                    <label>Email Address</label>
                    <div class="value"><?php echo htmlspecialchars($buyer['Email']); ?></div>
                </div>
                <div class="profile-item" style="grid-column: span 2;">
                    <label>Contact Number</label>
                    <div class="value"><?php echo htmlspecialchars($buyer['ContactNo']); ?></div>
                </div>
            </div>
            <div class="action-buttons">
                <a href="Bupdateform.php" class="btn btn-primary">
                    <i class='bx bx-edit-alt'></i> Update Profile
                </a>
                <form action="bprofildelet.php" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')" style="display: inline;">
                    <button type="submit" class="btn btn-danger">
                        <i class='bx bx-trash'></i> Delete Account
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <h2><i class='bx bxs-home-heart'></i> Recently Viewed Properties</h2>
            <div class="empty-state">
                <i class='bx bx-home-smile'></i>
                <h3>No Properties Viewed Yet</h3>
                <p>Start browsing properties to see them here</p>
                <a href="../../property.php" class="btn btn-primary">
                    <i class='bx bx-search'></i> Browse Properties
                </a>
            </div>
        </div>
    </div>
</body>

</html>
