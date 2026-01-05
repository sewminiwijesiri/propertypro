<?php
require '../../includes/config.php';

if (isset($_POST['sellerID'])) {
    $sellerID = $_POST['sellerID'];

    
    $sql = "DELETE FROM seller WHERE sellerID = $sellerID";

    if ($conn->query($sql) === TRUE) {
        echo "Seller removed successfully!";
    } else {
        echo "Error deleting seller: " . $conn->error;
    }
}
$conn->close();


header("Location:sellermanage.php");
exit();
?>




