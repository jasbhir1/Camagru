<?php
session_start();
$host = "localhost";
$username = "root";
$password = "123456";
$database = "camagru";
$message = "";

if(isset($_POST['update']))
{
    try{
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    // get values from input text form and number
    $email = $_POST['email'];
    $password = rand(1000, 9999);
    
    // mysql query to Update data
    
    $query = "UPDATE `users` SET `password`=:password WHERE `email` = :email";
    
    $pdoResult = $connect->prepare($query);
    
    $pdoExec = $pdoResult->execute(array(":password"=>hash('whirlpool', $password),":email"=>$email));
    
    if($pdoExec)
    {
        $str = "your temporary password is -->" .$password;

        mail($email, "CAMAGRU temporary password", $str);
        echo "Check your email for temporary password,you will be redirected in 3 seconds"; 
        header('Refresh: 3; URL=http://localhost:8081/camagru/login.php');
    }else{
        echo 'ERROR Data Not Updated';
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FORGOT PASSWORD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="forgot_password.php" method="post">
        <p>1) Please enter your email address below</p> <br>
        <p>2) A temporary password will be sent to your email</p><br>
        <p>3) Login with your temporary password</p><br>
        <p>4) Once logged in then set your own password using updated details</p><br>
        <input class="input" placeholder="Enter email address" type="email" name="email" required>
        <input type="submit" name="update" required placeholder="Send email">
        </form>
    </body>
</html>