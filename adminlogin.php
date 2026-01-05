<?php
session_start();

$admin_username = 'admin@gmail.com';
$admin_password = '123';

$moderator_username = 'moderator@gmail.com';
$moderator_password = 'mod123';

$customer_support_username = 'support@gmail.com';
$customer_support_password = 'support123';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    } elseif ($username === $moderator_username && $password === $moderator_password) {
        $_SESSION['moderator_logged_in'] = true;
        header("Location: mod.php");
        exit();
    } elseif ($username === $customer_support_username && $password === $customer_support_password) {
        $_SESSION['support_logged_in'] = true;
        header("Location: support.php");
        exit();
    } else {
        header("Location: adminlogin.php?error=1");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Access | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --emerald: #10b981;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.9);
            --shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
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
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -10%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -10%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
            z-index: -1;
        }

        .home-link {
            position: fixed;
            top: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--white);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            text-decoration: none;
            z-index: 100;
        }

        .home-link:hover {
            transform: translateY(-5px) rotate(5deg);
            color: var(--blue);
        }

        .main-container {
            max-width: 1200px;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            perspective: 1000px;
        }

        .login-card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            padding: 3rem 2.5rem;
            border-radius: 35px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: var(--shadow);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .login-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: #f1f5f9;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto;
            color: var(--blue);
            transition: all 0.4s ease;
        }

        .login-card:hover .icon-box {
            background: var(--blue);
            color: var(--white);
            transform: scale(1.1);
        }

        h2 {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .input-group {
            position: relative;
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
        input[type="password"] {
            width: 100%;
            padding: 1.2rem 1.2rem 1.2rem 3.5rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 18px;
            font-size: 1rem;
            color: var(--primary);
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            background: var(--white);
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        input[type="submit"] {
            padding: 1.2rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 18px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(30, 41, 59, 0.2);
        }

        input[type="submit"]:hover {
            background: var(--blue);
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .error {
            background: #fef2f2;
            color: #ef4444;
            padding: 0.8rem;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            body { padding: 1rem; }
            .main-container { gap: 1.5rem; }
            .login-card { padding: 2.5rem 1.5rem; }
        }
    </style>
</head>
<body>
    <a href="home.php" class="home-link">
        <i class='bx bxs-home'></i>
    </a>

    <div class="main-container">
        <!-- Admin Login -->
        <div class="login-card">
            <div class="icon-box"><i class='bx bxs-shield-quarter'></i></div>
            <h2>Admin Login</h2>
            <form method="post" action="adminlogin.php">
                <div class="input-group">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="username" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <input type="submit" value="Log In Account">
                
                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <p class='error'>Invalid admin credentials.</p>
                <?php endif; ?>
            </form>
        </div>

        <!-- Moderator Login -->
        <div class="login-card">
            <div class="icon-box"><i class='bx bxs-user-check'></i></div>
            <h2>Moderator Login</h2>
            <form method="post" action="adminlogin.php">
                <div class="input-group">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="username" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <input type="submit" value="Log In Account">

                <?php if(isset($_GET['error']) && $_GET['error']==2): ?>
                    <p class='error'>Invalid moderator credentials.</p>
                <?php endif; ?>
            </form>
        </div>

        <!-- Customer Support Login -->
        <div class="login-card">
            <div class="icon-box"><i class='bx bxs-headphone'></i></div>
            <h2>Support Login</h2>
            <form method="post" action="adminlogin.php">
                <div class="input-group">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="username" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <input type="submit" value="Log In Account">

                <?php if(isset($_GET['error']) && $_GET['error']==3): ?>
                    <p class='error'>Invalid support credentials.</p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>