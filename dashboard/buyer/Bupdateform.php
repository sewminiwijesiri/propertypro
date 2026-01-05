<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buyer Information</title>
    <link rel="stylesheet" href="assets/css/Bupdateform.css"> 
</head>
<body>
    <div class="container">
        
        <form action="buyerupdat.php" method="POST"> 
            
                <label for="buyerID">Buyer ID:</label>
                <input type="text" id="buyerID" name="buyerID" required>
            
                <label for="name">Name:</label>
                <input type="text" id="username" name="name" required>

                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>
            
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            
                
           
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>
