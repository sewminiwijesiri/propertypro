<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property</title>
    <link rel="stylesheet" href="assets/css/privacy.css">
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

    <section class="privacy-container">
        <div class="policy-header">
            <h1>Privacy Policy</h1>
        </div>
        
        <div class="policy-content">
            <h2>Introduction</h2>
            <p>At Property Pro, we are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>
            
            <h2>Information We Collect</h2>
            <p>We may collect personal information such as your name, email address, phone number, and other details you provide when using our site or services. We also collect non-personal data through cookies, web beacons, and other similar technologies.</p>

            <h2>How We Use Your Information</h2>
            <p>Your information helps us to provide and improve our services, communicate with you, ensure security, and comply with legal obligations.</p>

            <h2>Data Sharing</h2>
            <p>We do not share your personal information with third parties except to comply with the law, protect our rights, or facilitate the services you request.</p>

            <h2>Security of Your Information</h2>
            <p>We use technical and organizational security measures to protect your data. However, no method of transmission over the internet is 100% secure.</p>

            <h2>Changes to This Policy</h2>
            <p>We may update this Privacy Policy from time to time. Please review it periodically for changes. Your continued use of our services after any changes signifies your acceptance of the new terms.</p>

        </div>
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
