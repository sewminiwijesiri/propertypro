<?php
    require 'includes/config.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $pID=$_POST["postid"];

        $sql="DELETE FROM post WHERE postID='$pID'";

        if($conn->query($sql)==TRUE)
        {
            echo "Successfully Deleted";
        }
        else
        {
            echo "Error deleting post: ".$conn->error;
        }

        header("location: seller.php");
        exit();
    }

    $conn->close();



?>
