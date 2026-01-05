session_start();
require '../../includes/config.php';

if (!isset($_SESSION['sellerID'])) {
    header("Location: ../../login.php");
    exit();
}

$sellerID = $_SESSION['sellerID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postid'])) {
    $pID = $conn->real_escape_string($_POST["postid"]);

    // Security check: Ensure this post belongs to the logged-in seller
    $sql = "DELETE FROM post WHERE postID = '$pID' AND sellerID = '$sellerID'";

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
