<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login2.css?v=<?php echo time(); ?>" />
    <!-- <link rel="stylesheet" href="./css/login_defend.css?v=<?php echo time(); ?>" /> -->
</head>
<body>


    <div class="wrapper">
        <div class="container">
            <h1>EkoUNIMED</h1>
            
            <form method="post" action="main_login.php" class="form">
                <input type="text" name="uname" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit" id="login-button">Login</button>
            </form>
        </div>
        
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    <!-- <script src="js/login.js"></script> -->


</body>
</html>