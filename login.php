<?php include 'loginpage.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <h1>CAMAGRU</h1>
    <br />
    <?php
    if (isset($message))
    {
        echo '<label class= "text-danger">'.$message.'</label>';
    }
    ?>
    <div class="box23">
        <div class="box2">
            <h2>LOGIN</h2>
            <a href="forgot_password.php"><input class="submit" type="submit" value="forgot password?" name="forgot"></a>
            <h3>Username:</h3>
        <form class="form-inline" method="post" action="loginpage.php">
            <input class="input" placeholder="Enter username" type="text" name="username" required><br>
            <h3>Password:</h3>
            <input class="input" placeholder="Enter password" type="password" name="password" required><br><br>
            <a href="home.html"><input class="submit" type="submit" value="Submit" name="login"></a>
        </form>
        </div>
        <div class="gaps"></div>
        <div class="box3">
            <h2>SIGN UP</h2>
            <h4>Username:</h4>
        <form class="form-inline" method="post" action="signup.php">
            <input class="input" placeholder="Enter username" type="text" name="username" required><br>
            <h4>Email:</h4>
            <input class="input" placeholder="Enter email address" type="email" name="email" required> <br> 
            <h4>Password:</h4>
            <input class="input" placeholder="Enter password" type="password" name="password" required><br><br>
            <a href="home.html"></a><input class="submit" type="submit" name="submit" value="Submit">
        </form>
        </div>
    </div>
</body>
</html>