<?php

session_start();
$host = "localhost";
$username = "root";
$password = "123456";
$database = "camagru";
$message = "";


$image=$_POST['image'];
try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
    catch(PDOException $error)
  {
      $message = $error->getMessage();
  }

    $display = "SELECT * FROM images WHERE 1";
    $do = $connect->query($display);

    $id = $_GET['id'];
    echo '<br /><br /><a href="index.php">Home <- or</a>';
    echo '<a href="logout.php">-> logout now</a>';
    echo '<br /><br />';

    while($pics = $do->fetch())
    {

    //   echo "<img src=\"uploads/".$pics['picProfile']."\">";
    $pic = $pics['picProfile'];
    // echo $pic;
      echo "<img src='data:image/png;base64,$pic'>";
      echo $pics['username']."  said  ";
      echo $pics['image_text'];

      

      echo "<script>
 window.location.Gallery;
 </script>";
    }
  

?>
 