
<!--Insert data to database (table post)-->
<?php
session_start();

require '../../includes/config.php'; 

$sellerID=$_SESSION['sellerID'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $ptitle = $_POST["title"];
    $pdescrip = $_POST["description"];
    $plocation = $_POST["location"];
    $pprice = $_POST["price"];
    $pcontact=$_POST['contact'];

    // Handle the file upload
    $targetDir = "uploads/"; // Folder where the images will be stored
    $fileName = basename($_FILES["propertyImage"]["name"]);
    $targetFile = $targetDir . $fileName;

    // Move the uploaded image to the 'uploads/' folder
    if (move_uploaded_file($_FILES["propertyImage"]["tmp_name"], $targetFile)) {
        // Save the post details along with the image path in the database
        $sql = "INSERT INTO post VALUES ('', '$sellerID', '$targetFile', '$ptitle', '$pdescrip', '$plocation', '$pprice','$pcontact','pending')";

        if ($conn->query($sql) === TRUE) {
            echo "Post submitted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "There was an error uploading the file.";
    }

    header("location:seller.php");
    exit();

}

// Close the connection
$conn->close();

?>

