<?php
//to login with details

session_start();
$host = "localhost";
$username = "root";
$password = "123456";
$database = "camagru";
$message = "";

try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"]))
    {
        if(empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All Fields are required</label>';
        }
        else
        {
            
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["username"],
                    'password' => hash('whirlpool', $_POST["password"])
                )
            );
            $count = $statement->rowCount();
            
            if($count == 1)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:index.php");
            }
            else
            {
                echo "Incorrect username or password,you will be redirected in 3 seconds"; 
                header('Refresh: 3; URL=http://localhost:8081/camagru/login.php');
            }
        }
    }
}
catch(PDOException $error)
{
    $message = $error->getMessage();
}

?>