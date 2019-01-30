<?php
    session_start();


try{
    $con = new PDO("mysql:host=localhost;dbname=camagru","root","123456");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is not a valid email address");
          }
        $pass = $_POST['password'];
        if (strlen($pass) < 8 || strlen($pass) > 12 || !preg_match("#[A-Z]+#", $pass))
        {
            echo ("password must be 6-12 characters and contain atleast 1 capital letter");
            header('Refresh: 5; URL=http://localhost:8081/camagru/login.php');
        }
        else
        {
        $code = rand(100000, 999999);
        $pass_hash = hash('whirlpool', $pass);
        $insert = $con->prepare("INSERT INTO users (username,email,password,code)
        values(:username,:email,:password,:code)");
            $insert->bindParam(':username',$username);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':password',$pass_hash);
            $insert->bindParam(':code',$code); 
            $insert->execute();
            $str = "your verification link is http://localhost:8081/camagru/index.php?user=".$email."&code=".$code;

            mail($email, "CAMAGRU Confirmation", $str);
            echo "Link sent: You will be redirected in 5 seconds";
            header('Refresh: 5; URL=http://localhost:8081/camagru/login.php');
        }
        }
        
    }

    catch(PDOException $e)
    {
    echo "error".$e->getMessage();
    }
?>