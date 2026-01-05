<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Management</title>
    <link rel="stylesheet" href="assets/css/buyermanage.css">
</head>
<body>
    <div class="container">
        <h1>Buyer Management</h1>
        <table>
            <thead>
                <tr>
                    <th>Buyer ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="sellerTable">
                <?php
                // updat seller table
                require '../../includes/config.php';

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT buyerID, Name, Username, Email FROM buyer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["buyerID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Username"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>";
                        echo "<form action='Bmangedelet.php' method='POST'>";
                        echo "<input type='hidden' name='buyerID' value='" . $row["buyerID"] . "'>";
                        echo "<button class='reject' type='submit'>Reject</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No buyer found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
