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
        
        $images = $_FILES['profile']['name']; //gets image name
        
        $image_text = $_POST['image_text'];  //gets text from user input

        $tmp_dir = $_FILES['profile']['tmp_name'];
        
        $imageSize = $_FILES['profile']['size'];
       
        $upload_dir = 'uploads/'; //img file directory
        $imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array("jpeg", "jpg", "png", "gif", "pdf"); //list of valid image types that can be uploaded
        $picProfile = rand(1000, 1000000).".".$imgExt; //creates random name for image
        
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile); //moves file from current directory to upload directory
        $file = file_get_contents($upload_dir.$picProfile,true );
        $enc = base64_encode($file);
        $stmt = $connect->prepare('INSERT INTO images(username, picProfile, image_text) VALUES (:uname, :upic, :utxt)');
        $stmt->bindParam(':uname', $name);
        $stmt->bindParam(':upic', $enc);
        $stmt->bindParam(':utxt', $image_text);
        if($stmt->execute())
        {
          
            ?>
            <script>
                alert("new record successul");
                window.location.href=('personal_gallery.php');
            </script>
        <?php
        }
        else{
            ?>
            <script>
                alert("Error");
                window.location.href=('photo_index.php');
            </script>
        <?php
        }
    }
        else{
            ?>
            <script>
                alert("enter correct username");
                window.location.href=('photo_index.php');
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

 
<body>
<div id="content">
  <form method="POST" action="photo_index.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
      <input class="input" placeholder="Enter username" type="text" name="username" required><br>
  	  <input type="file" name="profile" required="" accept="*/image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="btn-add">Add new</button>
  	</div>
  </form>
</div>
<?php     echo '<br /><br /><a href="index.php">Home <- or </a>';
    echo '<a href="logout.php">-> logout now</a>';
    ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</body>
</html>








