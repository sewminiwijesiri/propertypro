<?php
require 'includes/config.php';

if (isset($_POST['buyerID'])) {
    $buyerID = $_POST['buyerID'];

    // SQL query to delete buyer by ID
    $sql = "DELETE FROM buyer WHERE buyerID = $buyerID";

    if ($conn->query($sql) === TRUE) {
           echo "<script>
            alert('Buyer deleted successfully!');
            window.location.href='buyermanage.php';
        </script>";
    } else {
        echo "<script>
            alert('Erro');
            window.location.href='buyermanage.php';
        </script>";
        
   
    }
}
$conn->close();
?>
