<?php 
require '../../includes/config.php';


if (isset($_GET['postid'])) {
    $postID = $_GET['postid'];
    
    $sql = "SELECT type, description, location, price, contact FROM post WHERE postID='$postID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="main-container">
                <h2>Edit Post</h2>
            <div class="create-post">
                <form method="POST" action="updatepost.php">
                    <input type="hidden" name="postid" value="<?php echo $postID; ?>">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $row['type']; ?>" required>

                    <label for="description">Description:</label>
                    <textarea name="description" required><?php echo $row['description']; ?></textarea>

                    <label for="location">Location:</label>
                    <input type="text" name="location" value="<?php echo $row['location']; ?>" required>

                    <label for="price">Price:</label>
                    <input type="number" name="price" value="<?php echo $row['price']; ?>" required>

                    <label for="contact">Contact Number:</label>
                    <input type="number" name="contact" value="<?php echo $row['contact']; ?>" required>

                    <button type="submit">Update Post</button>
                </form>
            </div>
        </div>
        <?php
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid post ID.";
}
?>



<style>
    
.main-container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #444;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.main-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #b4afaf;
}

.create-post form {
    display: flex;
    flex-direction: column;
}

.create-post label {
    margin-top: 10px;
    font-weight: bold;
    color: white;
}

.create-post input[type="text"],
.create-post input[type="number"],
.create-post textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #b4afaf;
}

.create-post textarea {
    height: 100px;
    resize: vertical;
}

.create-post button {
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.create-post button:hover {
    background-color: #0056b3;
}

@media (max-width: 768px) {
    .main-container {
        padding: 15px;
        margin: 20px auto;
    }

    .create-post button {
        font-size: 14px;
        padding: 8px;
    }
}

@media (max-width: 576px) {
    .main-container {
        margin: 10px auto;
        padding: 10px;
    }

    .create-post input[type="text"],
    .create-post input[type="number"],
    .create-post textarea {
        padding: 8px;
    }

    .create-post button {
        padding: 10px;
        font-size: 14px;
    }
}
</style>
