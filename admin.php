<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

    <header class="main-head">
        <div class="head">
            <h1>Property<span>pro</span></h1>
        </div>
    </header>

    <div class="manage-container">
        <div class="manage-sidebar">
            <button><a href="sellermanage.php">Seller Management</a></button>
            <button><a href="buyermanage.php">Buyer Management</a></button>
            <button><a href="Adcreatsellers.php">Create Seller</a></button>
            <button><a href="login.php">Logout</a></button>
        </div>

        <div class="main-content">
            <div class="monthly-report">
                <h2>Report Calculator</h2>
                <button id="generateReportButton">Generate Report</button>
                <div class="results" id="results">
                    <div class="header">
                        <p class="label1">Sellers</p>
                        <p class="label">Buyers</p>
                    </div>
                    <div class="count-boxes">
                        <div class="count-box" id="sellerCountBox">
                            <p>Count</p>
                            <p><span id="sellerCount"></span></p>
                        </div>
                        <div class="count-box" id="buyerCountBox">
                            <p>Count</p>
                            <p><span id="buyerCount"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Seller Details Form -->
            <div class="update-seller">
                <h2>Update Seller Details</h2>
                <form method="POST" action="updatseller.php">
                    <label for="sellerID"><p>Seller ID:</p></label>
                    <input type="text" id="sellerID" name="sellerID" required>

                    <label for="username"><p>Username:</p></label>
                    <input type="text" id="username" name="username" required>

                    <label for="contact"><p>Contact Number:</p></label>
                    <input type="text" id="contact" name="contact" required>

                    <label for="email"><p>Email:</p></label>
                    <input type="email" id="email" name="email" required>

                    <button type="submit" name="update_seller">Update Seller</button>
                </form>
            </div>

            <?php
            
            require 'includes/config.php';

            // Initialize counts
            $sellerCount = 0;
            $buyerCount = 0;

            if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check method
               
                $sellerQuery = "SELECT COUNT(*) AS count FROM seller";// get to seller count for query 
                $sellerResult = $conn->query($sellerQuery);
                if ($sellerResult) {
                    $sellerRow = $sellerResult->fetch_assoc();
                    $sellerCount = $sellerRow['count'];
                }

               
                $buyerQuery = "SELECT COUNT(*) AS count FROM buyer";
                $buyerResult = $conn->query($buyerQuery);
                if ($buyerResult) {
                    $buyerRow = $buyerResult->fetch_assoc();
                    $buyerCount = $buyerRow['count'];
                }
            }

           
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "<script>
                    document.getElementById('sellerCount').innerText = '$sellerCount'; 
                    document.getElementById('buyerCount').innerText = '$buyerCount';
                </script>";//display sellers and buyers count
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script>
       //report genrator
     document.getElementById('generateReportButton').addEventListener('click', function() {
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.style.display = 'none'; 

    document.body.appendChild(form);
    form.submit(); // Submit the form
});



    </script>

</body>
</html>
