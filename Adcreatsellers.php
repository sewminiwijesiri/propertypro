<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Seller Account | Property Pro</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap');

        :root {
            --primary: #1e293b;
            --blue: #3b82f6;
            --emerald: #10b981;
            --white: #ffffff;
            --shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            --glass: rgba(255, 255, 255, 0.9);
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
            overflow: hidden;
        }

        /* Decorative circles */
        body::before {
            content: '';
            position: absolute;
            top: -5%;
            right: -5%;
            width: 300px;
            height: 300px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            z-index: -1;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -5%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 50%;
            z-index: -1;
        }

        .form-container {
            background: var(--glass);
            backdrop-filter: blur(20px);
            width: 100%;
            max-width: 380px;
            padding: 1.5rem 1.5rem;
            border-radius: 30px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.5);
            text-align: center;
        }

        .icon-header {
            width: 50px;
            height: 50px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--blue);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }

        h1 {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 0.3rem;
            font-weight: 800;
        }

        p.subtitle {
            color: #64748b;
            margin-bottom: 1.2rem;
            font-weight: 500;
            font-size: 0.85rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            background: #f8fafc;
            border: 2px solid #f1f5f9;
            border-radius: 15px;
            outline: none;
            transition: 0.3s;
            font-size: 0.9rem;
            color: var(--primary);
        }

        input:focus {
            background: white;
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            padding: 0.9rem;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 0.5rem;
            box-shadow: 0 10px 20px rgba(30, 41, 59, 0.15);
        }

        .submit-btn:hover {
            background: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 1.2rem;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .back-link:hover {
            color: var(--blue);
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 2.5rem 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <div class="icon-header">
            <i class='bx bxs-user-plus'></i>
        </div>
        <h1>Create Seller</h1>
        <p class="subtitle">Add a new premium seller to the platform</p>

        <form action="adcreatsellersform.php" method="post">
            <div class="input-group">
                <i class='bx bxs-user-detail'></i>
                <input type="text" placeholder="Full Name" name="name" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-phone'></i>
                <input type="tel" placeholder="Contact Number" name="contact" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-envelope'></i>
                <input type="email" placeholder="Email Address" name="email" required>
            </div>

            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Password" name="password" required>
            </div>

            <button type="submit" class="submit-btn">Create Seller Account</button>
        </form>

        <a href="admin.php" class="back-link">
            <i class='bx bx-left-arrow-alt'></i> Back to Admin Dashboard
        </a>
    </div>

</body>

</html>