<?php

require '../../includes/config.php' ;

$sid=$_POST["sellerID"];
$username=$_POST["username"];
$contact=$_POST["contact"];
$email=$_POST["email"];

      $sql="UPDATE seller  set Username='$username',ContactNo='$contact',Email='$email'WHERE sellerID='$sid'";

        if($conn->query($sql))
        {
            echo "<script>
            alert('Buyer deleted successfully!');
            window.location.href='sellermanage.php';
        </script>";
        }
        else{
            echo "<script>
            alert('Buyer deleted successfully!');
            window.location.href='sellermanage.php';
        </script>";
        }
    
 header("Location:sellermanage.php");





?>
