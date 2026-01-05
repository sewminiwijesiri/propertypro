<?php
require 'includes/config.php';
$query = "SELECT * FROM post WHERE status = 'Approved'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --emerald: #10b981;
            --slate: #64748b;
            --white: #ffffff;
            --bg: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--primary);
            padding-top: 80px;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }

        .logo span {
            color: var(--blue);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--slate);
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--blue);
        }

        /* Page Hero */
        .page-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 4rem 8%;
            color: white;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .page-header p {
            opacity: 0.8;
            font-size: 1.1rem;
        }

        /* Filter Section */
        .filters {
            padding: 2rem 8%;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: -30px;
        }

        .filter-btn {
            background: white;
            padding: 1rem 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            color: var(--slate);
        }

        .filter-btn.active {
            background: var(--blue);
            color: white;
            border-color: var(--blue);
        }

        /* Property Grid */
        .properties-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2.5rem;
            padding: 4rem 8%;
        }

        .prop-card {
            background: white;
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            transition: 0.4s ease;
        }

        .prop-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .prop-img-box {
            height: 260px;
            position: relative;
        }

        .prop-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prop-status {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            padding: 0.5rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--emerald);
        }

        .prop-content {
            padding: 2rem;
        }

        .prop-price {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--blue);
            margin-bottom: 0.5rem;
        }

        .prop-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .prop-loc {
            color: var(--slate);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .prop-details {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem 0;
            border-top: 1px solid #f1f5f9;
            margin-bottom: 1.5rem;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--slate);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .detail-item i {
            font-size: 1.2rem;
            color: #cbd5e1;
        }

        .view-btn {
            display: block;
            width: 100%;
            text-align: center;
            background: var(--primary);
            color: white;
            padding: 1.2rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
        }

        .view-btn:hover {
            background: var(--blue);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        /* No Results */
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 5rem;
            color: var(--slate);
        }

        .no-results i {
            font-size: 4rem;
            display: block;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 0 5%;
            }

            .nav-links {
                display: none;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="home.php" class="logo">Property<span>Pro</span></a>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="property.php" style="color: var(--blue)">Properties</a></li>
            <li><a href="aboutus.php">Our Story</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div style="font-size: 1.5rem; display: flex; gap: 1.5rem;">
            <a href="login.php" style="color: var(--primary)"><i class='bx bx-user-circle'></i></a>
            <a href="chatbox.php" style="color: var(--primary)"><i class='bx bx-message-square-dots'></i></a>
        </div>
    </nav>

    <header class="page-header">
        <h1>Find Your Home</h1>
        <p>Explore verified property listings from top sellers across Sri Lanka</p>
    </header>

    <div class="filters">
        <button class="filter-btn active">All Properties</button>
        <button class="filter-btn">House</button>
        <button class="filter-btn">Land</button>
        <button class="filter-btn">Apartment</button>
    </div>

    <div class="properties-grid">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="prop-card">
                    <div class="prop-img-box">
                        <img src="<?php echo $row['img']; ?>" alt="Property">
                        <div class="prop-status">
                            <i class='bx bxs-check-shield'></i> Verified
                        </div>
                    </div>
                    <div class="prop-content">
                        <div class="prop-price">LKR
                            <?php echo number_format($row['price'] / 1000000, 1); ?>M
                        </div>
                        <h3 class="prop-title">
                            <?php echo $row['type']; ?> in
                            <?php echo $row['location']; ?>
                        </h3>
                        <p class="prop-loc"><i class='bx bx-map-pin'></i>
                            <?php echo $row['location']; ?>, Sri Lanka
                        </p>

                        <div class="prop-details">
                            <div class="detail-item"><i class='bx bx-bed'></i> <span>3+</span></div>
                            <div class="detail-item"><i class='bx bx-bath'></i> <span>2+</span></div>
                            <div class="detail-item"><i class='bx bx-area'></i> <span>2400 sqft</span></div>
                        </div>

                        <a href="contact.php" class="view-btn">Contact Seller</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="no-results">
                    <i class="bx bx-search"></i>
                    <h3>No properties found</h3>
                    <p>Try searching for a different location or category.</p>
                  </div>';
        }
        ?>
    </div>

    <footer style="background: #0f172a; color: white; padding: 4rem 8%; text-align: center;">
        <p>&copy; 2024 Property Pro. All Rights Reserved. Designed by SLIIT Students</p>
    </footer>
</body>

</html>