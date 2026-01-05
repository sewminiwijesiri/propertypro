<?php

require 'includes/config.php' ;

$Bid=$_POST["buyerID"];
$name=$_POST["name"];
$contact=$_POST["contact"];
$email=$_POST["email"];

      $sql="UPDATE buyer  set Name='$name',ContactNo='$contact',Email='$email'WHERE buyerID='$Bid'";

        if($conn->query($sql))
        {
            echo "Updated";
        }
        else{
            echo "Not updated";
        }
    
        header("Location:buyer.php");





?>
