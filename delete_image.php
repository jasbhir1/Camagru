<?php 
    session_start();
    $host = "localhost";
    $username = "root";
    $password = "123456";
    $database = "camagru";
    $message = "";
    
    try{
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $error)
{
    $message = $error->getMessage();
}    
//if upload button is pressed
    if(isset($_POST['btn-add']))
    {
      
       
        $name = $_POST['username'];
        if ($name == $_SESSION['username'])
        {
        
        $images = $_POST['id']; 
     
        

        $stmt = $connect->prepare("DELETE FROM `images` WHERE id = $images");
        if($stmt->execute())
        {
          
            ?>
            <script>
                alert("image deleted!!!");
                window.location.href=('personal_gallery.php');
            </script>
        <?php
        }
        else{
            ?>
            <script>
                alert("Error");
                window.location.href=('personal_gallery.php');
            </script>
        <?php
        }
    }
    else {
        ?>
        <script>
            alert("enter correct username");
            window.location.href=('delete_image.php');
        </script>
    <?php
    }
 
    }    
?>


<!DOCTYPE html>
<html>
<head>
    <title>Image upload</title>
    <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head> 
<body>
<div id="content">
  <form method="POST" action="delete_image.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
      <input class="input" placeholder="Enter username" type="text" name="username" required><br>
      <input class="input" placeholder="Enter image id" type="text" name="id" required><br>
  	</div>
  	<div>
  		<button type="submit" name="btn-add">Delete image</button>
  	</div>
  </form>
</div>
<?php     echo '<br /><br /><a href="index.php">Home <- or </a>';
    echo '<a href="logout.php">-> logout now</a>';
    ?>

</body>

</html>
