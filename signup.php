<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --white: #ffffff;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 550px;
            padding: 4rem 3rem;
            border-radius: 40px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            margin-bottom: 3rem;
            display: block;
        }

        .logo span {
            color: var(--blue);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        p {
            color: #64748b;
            margin-bottom: 3rem;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
            text-align: left;
        }

        .input-group {
            position: relative;
        }

        .input-group.full {
            grid-column: span 2;
        }

        .input-group i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 1.1rem 1.1rem 1.1rem 3.5rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 18px;
            outline: none;
            transition: 0.3s;
            font-size: 1rem;
        }

        input:focus {
            border-color: var(--blue);
            background: white;
        }

        .role-selector {
            grid-column: span 2;
            display: flex;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .role-option {
            flex: 1;
            position: relative;
        }

        .role-option input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .role-label {
            display: block;
            padding: 1rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 15px;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
        }

        .role-option input:checked+.role-label {
            background: rgba(59, 130, 246, 0.05);
            border-color: var(--blue);
            color: var(--blue);
        }

        .submit-btn {
            grid-column: span 2;
            background: var(--primary);
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background: var(--blue);
            transform: scale(1.02);
        }

        .footer-text {
            grid-column: span 2;
            text-align: center;
            margin-top: 2rem;
            color: #64748b;
        }

        .footer-text a {
            color: var(--blue);
            text-decoration: none;
            font-weight: 700;
        }

        .back-home {
            position: absolute;
            top: 2rem;
            left: 2rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>

<body>
    <a href="home.php" class="back-home"><i class='bx bx-left-arrow-alt'></i> Back to Home</a>

    <div class="login-card">
        <a href="home.php" class="logo">Property<span>Pro</span></a>
        <h2>Join With Us</h2>
        <p>Create an account to start your journey</p>

        <form action="singupform.php" method="POST">
            <div class="role-selector">
                <div class="role-option">
                    <input type="radio" name="role" value="Buyer" id="buyer" checked>
                    <label for="buyer" class="role-label">I'm a Buyer</label>
                </div>
                <div class="role-option">
                    <input type="radio" name="role" value="Seller" id="seller">
                    <label for="seller" class="role-label">I'm a Seller</label>
                </div>
            </div>

            <div class="input-group">
                <i class='bx bxs-user-detail'></i>
                <input type="text" name="Name" placeholder="Full Name" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" name="Username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="Email" placeholder="Email Address" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-phone'></i>
                <input type="tel" name="ContactNo" placeholder="Contact No" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="Password" placeholder="Password" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-lock'></i>
                <input type="password" name="RePassword" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="submit-btn" name="submit">Create Account</button>

            <p class="footer-text">Already have an account? <a href="login.php">Sign In</a></p>
        </form>
    </div>
</body>

</html>