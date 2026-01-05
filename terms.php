<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms</title>
    <link rel="stylesheet" href="assets/css/terms.css">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header id="navbar">

        <div class="head">
            <h1>Property<span>pro</span></h1>
        </div>

        
        <input type="checkbox" id="check">

        <nav class="navbar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="property.php">Property</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="nav-icon">
            <a href="home.php"><abbr title="Home"><i class='bx bxs-home'></i></abbr></a>
            <a href="login.php"><abbr title="Login/Sign Up"><i class='bx bx-user'></i></abbr></a>
            <div id="chat-icon" onclick="href='chat.php'">
                <a href="chat.php"><abbr title="chatBox"><i class='bx bxs-message-rounded-dots'></i></abbr></a>
            </div>
        </div>

        <label for="check" class="menu-btn">
            <i class='bx bx-menu'></i>
        </label>

    </header>

    <section class="terms-container">
        <h1>Terms and Conditions</h1>
        <p>Welcome to PropertyPro! Please read these terms and conditions carefully before using our website.</p>

        <h2>1. Acceptance of Terms</h2>
        <p>By accessing or using our website, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you disagree with any part of the terms, then you may not access the service.</p>

        <h2>2. Changes to Terms</h2>
        <p>We reserve the right to update or modify these Terms at any time. We will notify you of any changes by posting the new Terms on this page.</p>

        <h2>3. Use of Website</h2>
        <p>Our website allows you to view properties, post property listings, and communicate with other users. You agree to use the website only for lawful purposes and in a way that does not infringe the rights of others.</p>

        <h2>4. Account Registration</h2>
        <p>When you create an account, you must provide accurate, complete information and keep your account password secure.</p>

        <h2>5. Intellectual Property</h2>
        <p>The content on our website, including text, graphics, logos, and images, is our property and protected by copyright laws. You may not copy or redistribute any part of the website without prior permission.</p>

        <h2>6. Limitation of Liability</h2>
        <p>PropertyPro will not be liable for any indirect or consequential losses arising out of your use of our website.</p>

        <h2>7. Termination</h2>
        <p>We reserve the right to terminate or suspend your access to the website without prior notice if you violate these Terms.</p>

        <h2>8. Governing Law</h2>
        <p>These Terms are governed by the laws of [Your Country]. Any disputes will be handled in the appropriate court within the jurisdiction.</p>

        <p>By continuing to use PropertyPro, you agree to these Terms and Conditions. If you have any questions, feel free to contact us at support@propertypro.com.</p>
    </section>

    <hr>
    <footer>
        <section>
            <div class="contact">
                <div class="first-info">
                    <div class="head">
                        <h1>Property<span>pro</span></h1>
                    </div>
                </div>
                <div class="details">
                    <h3>Contact Us</h3>
                    <p><i class='bx bxs-phone-call'></i>0778986338</p>
                    <p><i class='bx bxs-envelope' ></i>propertypro@gmail.com</p>
                </div>
                <div class="second-info">
                    <ul>
                    <h3>Navigation</h3>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="property.php">Property</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms and Condition</a></li>
                    </ul>
                </div>
                <div class="social-info">
                    <h3>Follow Us</h3>
                    <li><a href="#"><i class='bx bxl-facebook-circle'></i></a></li>
                    <li><a href="#"><i class='bx bxl-instagram-alt' ></i></a></li>
                </div>
            </div>
        </section>
    </footer>

    <section class="copyright">
        <p>Copyright @2024. All Right Reserved.Desingd By SLIIT Student</p>

    </section>

    <script>
        let prevScrollPos = window.pageYOffset;
        const navbar = document.getElementById("navbar");

        window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;
    
        if (prevScrollPos > currentScrollPos) {
            // Scrolling up, show the navbar
            navbar.style.top = "0";
        } else {
            // Scrolling down, hide the navbar
            navbar.style.top = "-100px";  // Adjust to match the navbar height
        }
        prevScrollPos = currentScrollPos;
    }
    </script>

    
</body>
</html>
