<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator</title>
    <link rel="stylesheet" href="assets/css/mod.css">
    <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

    <header>
        <div class="head">
            <h1>Property<span>pro</span></h1>
        </div>
    </header>

    <main>
        <div class="sidebar">
            <form method="POST">
                <button type="submit" name="totalpost">Total Post</button>
            </form>
           
            <?php
                require 'includes/config.php';

                if(isset($_POST['totalpost'])){

                    $sql="SELECT count(*) AS totalPost FROM post";
                    $result=$conn->query($sql);

                    if($result->num_rows>0){
                        $row=$result->fetch_assoc();
                        echo "<p>Total Posts: " .$row['totalPost'] ."</p>";
                    }
                    else{
                        echo "<p>Total Post: 0</p>";
                    }
                }
            
            ?>
             <form method="POST" action="modcreatsellers.php">
                <button type="submit" name="totalpost">Create sellers</button>
            </form>
            <form method="POST" action="modsellerviwe.php">
                <button type="submit" name="totalpost">Seller View</button>
            </form>
            <button><a href="login.php">Log out</a></button>

        </div>
        <div class="main-content">
            <h1>Moderator Dashboard</h1>
            <div class="pending-approval">
                <h2>Pending Approvals</h2>
                    <?php
                        require 'includes/config.php';
                        $sql = "SELECT postID, img, type, description, location, price, contact FROM post WHERE status = 'Pending'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            echo "<div class='posts-container'>";
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='post-item'>";
                                echo "<img src='" . $row['img'] . "' alt='Property Image' width='200px' height='150px'>";
                                echo "<p><strong>Title:</strong> " . $row['type'] . "</p>";
                                echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
                                echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
                                echo "<p><strong>Price (LKR):</strong> " . $row['price'] . "</p>";
                                echo "<p><strong>Call Us:</strong> " .$row['contact'] . "</p>";
                        
                                // Approve Button
                                echo "<form method='POST' action='approve.php'>";
                                echo "<input type='hidden' name='postid' value='".$row['postID']."'>";
                                echo "<button class='approve' type='submit'>Approve</button>";
                               
                                echo "</form>";
                        
                                // Remove Button
                                echo "<form method='POST' action='remove.php'>";
                                echo "<input type='hidden' name='postid' value='".$row['postID']."'>";
                                echo "<button class='remove' type='submit'>Remove</button>";
                               
                                echo "</form>";
                        
                                echo "</div>";
                            }
                            echo "</div>";
                        } else {
                            echo "No posts for approval.";
                        }
                        


                    ?>
            </div>
        </div>
    </main>

    
