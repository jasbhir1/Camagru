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

  $username = $_SESSION['username'];
    $display = "SELECT * FROM `images` WHERE username = '".$username."'";
    $do = $connect->query($display);

    $id = $_GET['id'];
    echo '<br /><br /><a href="index.php">Home <- or </a>';
    echo '<a href="logout.php">-> logout now <- or</a>';
    echo '<a href="delete_image.php">-> Delete a picture? <- or</a>';
    echo '<a href="photo_index.php">-> Upload a picture from pc</a>';
    echo '<br /><br />';
   

    while($pics = $do->fetch())
    {
        $pic = $pics['picProfile'];
      echo "<img src='data:image/png;base64,$pic'></a>";
        echo $pics['username']."  said  ";
      echo $pics['image_text']."  Likes= ";
      echo $pics['likes']." image id = ";
      echo $pics['id'];
      echo '<br /><br />';

      

      echo "<script>
 window.location.Gallery;
 </script>";
    }
  

?>