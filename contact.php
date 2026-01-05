<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --emerald: #10b981;
            --white: #ffffff;
            --bg: #f8fafc;
            --slate: #64748b;
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
            background: rgba(255, 255, 255, 0.9);
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
            padding: 10rem 8% 6rem;
            color: white;
            text-align: center;
        }

        .page-header h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }

        .page-header p {
            opacity: 0.8;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Contact Section */
        .contact-container {
            padding: 5rem 8%;
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 4rem;
            margin-top: -50px;
        }

        /* Info Cards */
        .info-panel {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .info-card {
            background: white;
            padding: 2.5rem;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .info-text h3 {
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .info-text p {
            color: var(--slate);
            font-weight: 500;
        }

        /* Form Card */
        .form-card {
            background: white;
            padding: 4rem;
            border-radius: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
        }

        .form-card h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .form-card p {
            color: var(--slate);
            margin-bottom: 3rem;
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

        .form-group.full {
            grid-column: span 2;
        }

        .form-group label {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--primary);
            margin-left: 0.5rem;
        }

        input,
        textarea {
            padding: 1.2rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 18px;
            outline: none;
            transition: 0.3s;
            font-size: 1rem;
        }

        input:focus,
        textarea:focus {
            background: white;
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: var(--blue);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
        }

        footer {
            background: #0f172a;
            color: white;
            padding: 3rem 8%;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .contact-container {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .page-header h1 {
                font-size: 2.5rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
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
            <li><a href="aboutus.php">Our Story</a></li>
            <li><a href="contact.php" style="color: var(--blue)">Contact Us</a></li>
        </ul>
        <div style="font-size: 1.5rem; display: flex; gap: 1.5rem;">
            <a href="login.php" style="color: var(--primary)"><i class='bx bx-user-circle'></i></a>
            <a href="chatbox.php" style="color: var(--primary)"><i class='bx bx-message-square-dots'></i></a>
        </div>
    </nav>

    <header class="page-header">
        <h1>Let's Connect</h1>
        <p>Have questions about a property or want to list your own? Our team is here to help you every step of the way.
        </p>
    </header>

    <div class="contact-container">
        <div class="info-panel">
            <div class="info-card">
                <div class="info-icon"><i class='bx bx-envelope'></i></div>
                <div class="info-text">
                    <h3>Email Us</h3>
                    <p>hello@propertypro.com</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon"><i class='bx bx-phone-call'></i></div>
                <div class="info-text">
                    <h3>Call Us</h3>
                    <p>+94 77 898 6338</p>
                </div>
            </div>
            <div class="info-card">
                <div class="info-icon"><i class='bx bx-map-pin'></i></div>
                <div class="info-text">
                    <h3>Visit Us</h3>
                    <p>123 Galle Road, Colombo 03</p>
                </div>
            </div>
        </div>

        <div class="form-card">
            <h2>Send a Message</h2>
            <p>Fill out the form below and we'll get back to you within 24 hours.</p>

            <form action="contact.php" method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text" placeholder="John Doe" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group full">
                        <label>Subject</label>
                        <input type="text" placeholder="Interested in a Property" required>
                    </div>
                    <div class="form-group full">
                        <label>Message</label>
                        <textarea rows="5" placeholder="Tell us how we can help..." required></textarea>
                    </div>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Property Pro. All Rights Reserved. Designed by SLIIT Students</p>
    </footer>
</body>

</html>