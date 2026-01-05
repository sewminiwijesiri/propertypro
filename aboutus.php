<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --emerald: #10b981;
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
            color: #64748b;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--blue);
        }

        /* Hero */
        .hero {
            padding: 10rem 8% 6rem;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('assets/images/about.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.8;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Story Section */
        .story-section {
            padding: 8rem 8%;
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 5rem;
            align-items: center;
        }

        .story-img {
            position: relative;
        }

        .story-img img {
            width: 100%;
            border-radius: 40px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
        }

        .experience-badge {
            position: absolute;
            bottom: -30px;
            right: -30px;
            background: var(--blue);
            color: white;
            padding: 2.5rem;
            border-radius: 30px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }

        .experience-badge h3 {
            font-size: 2.5rem;
            line-height: 1;
        }

        .experience-badge p {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        .story-content h2 {
            font-size: 3rem;
            margin-bottom: 2rem;
            line-height: 1.2;
        }

        .story-content p {
            font-size: 1.15rem;
            color: #64748b;
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .feature-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .feature-item i {
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
            padding: 0.8rem;
            border-radius: 12px;
            font-size: 1.5rem;
        }

        .feature-item h4 {
            margin-bottom: 0.5rem;
        }

        .feature-item p {
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        footer {
            background: #0f172a;
            color: white;
            padding: 4rem 8% 2rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .story-section {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="home.php" class="logo">Property<span>Pro</span></a>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="property.php">Properties</a></li>
            <li><a href="aboutus.php" style="color: var(--blue)">Our Story</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div style="font-size: 1.5rem; display: flex; gap: 1.5rem;">
            <a href="login.php" style="color: var(--primary)"><i class='bx bx-user-circle'></i></a>
            <a href="chatbox.php" style="color: var(--primary)"><i class='bx bx-message-square-dots'></i></a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Building Trust in Real Estate</h1>
            <p>Your journey to the perfect property starts here. We are dedicated to providing the most transparent and
                efficient real estate experience in Sri Lanka.</p>
        </div>
    </section>

    <section class="story-section">
        <div class="story-img">
            <img src="assets/images/house2.jpg" alt="About Us">
            <div class="experience-badge">
                <h3>100%</h3>
                <p>Verified Listings</p>
            </div>
        </div>
        <div class="story-content">
            <h2>We're more than just a listing site</h2>
            <p>At Property Pro, we take pride in being a trusted platform for buying and selling properties and land.
                With a focus on making the real estate process as seamless as possible, we connect buyers with sellers,
                offering a wide range of residential, commercial, and land options.</p>

            <div class="feature-grid">
                <div class="feature-item">
                    <i class='bx bx-shield-quarter'></i>
                    <div>
                        <h4>Secured Platform</h4>
                        <p>We verify every single property to ensure your safety.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <i class='bx bx-trending-up'></i>
                    <div>
                        <h4>Expert Insights</h4>
                        <p>Market leading intelligence at your fingertips.</p>
                    </div>
                </div>
            </div>

            <a href="contact.php"
                style="display: inline-block; margin-top: 3rem; background: var(--blue); color: white; padding: 1.2rem 2.5rem; border-radius: 15px; text-decoration: none; font-weight: 700;">Get
                In Touch</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Property Pro. All Rights Reserved. Designed by SLIIT Students</p>
    </footer>
</body>

</html>