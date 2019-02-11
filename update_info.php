<?php

// php update data in mysql database using PDO
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
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];
    
    
    
    // mysql query to Update data
    
    $query = "UPDATE `users` SET `username`=:username, `password`=:password WHERE `id` = :id";
    
    $pdoResult = $connect->prepare($query);
    
    $pdoExec = $pdoResult->execute(array(":username"=>$username,":password"=>hash('whirlpool', $password),":id"=>$id));
    
    if($pdoExec)
    {
        echo "Successfully Updated!!!,you will be redirected in 3 seconds"; 
        header('Refresh: 3; URL=http://localhost:8081/camagru/login.php');
    }else{
        echo 'ERROR Data Not Updated';
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>UPDATE LOGIN DETAILS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action="update_info.php" method="post">
            <input type="text" name="username" required placeholder="username"><br><br>
            <input type="password" name="password" required placeholder="password"><br><br>
            <input type="submit" name="update" required placeholder="Update Data">
        </form>
        <?php     echo '<br /><br /><a href="index.php">Home <- or </a>';
    echo '<a href="logout.php">-> logout now</a>';
    ?>
    </body>
</html>