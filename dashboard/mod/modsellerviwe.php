<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sellers Detailes </title>
    <link rel="stylesheet" href="assets/css/sellermanage.css">
</head>
<body>
    <div class="container">
        <h1>Sellers </h1>
        <table>
            <thead>
                <tr>
                    <th>Seller ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                 
                </tr>
            </thead>
            <tbody id="sellerTable">
                <?php
                require '../../includes/config.php';

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT sellerID, Name, Username, Email FROM seller";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["sellerID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No sellers found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
