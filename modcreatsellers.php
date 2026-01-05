<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="form-container">
        <form action="modcreatsellerform.php" method="post">
            <h1>Creat seller</h1>
            <div class="txt">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Username" name="username" required>
                <input type="tel" placeholder="Contact Number" name="contact" required>
                <input type="email" placeholder="E-mail" name="email" required>
             </div> 
            
            <div class="register_option">
                <input type="password" placeholder="Password" name="password" required>
                
         
                
            <button type="submit" class="submit-btn">Creat</button>
            <br>
           
            </div>
        </form>
    </div>


</body>
</html>
<style>


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: Arial,sans-serif;
    background-color: #82ebaa;
}
.form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    
    width: 100%;
    background-image: url(Images/back2.jpg);

   
    
    
}

.form-container form {
    padding: 20px;
    margin-top: 150px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.2);
    text-align: center;
    max-width: 400px;
    font-family:Arial, sans-serif;
    border-radius: 10px;
    font-family: Fredoka;
}

.form-container form h1 {
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 10px;
    color: black;
    font-family:Arial, sans-serif;
}
.txt input{
        margin-bottom: 5px;
        color: black;
}

.register_option {
    text-align: center;
    margin-bottom: 8px;
}









.form-container form input {
    width: 300px;
    padding: 10px 15px;
    font-size: 15px;
    margin: 8px;
}

.submit-btn {
    width: 100%;
    padding: 10px;
    background: hsl(198, 39%, 49%);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.submit-btn:hover {
    background-color: hsl(219, 40%, 45%);
}





</style>
