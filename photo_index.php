<!DOCTYPE html>
<html>
<head>
    <title>Insert Update Delete View Images</title>
</head>
<body>
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
    if(isset($_POST['btn-add']))
    {
        $name = $_POST['user_name'];
        $images = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $imageSize = $_FILES['profile']['size'];
 
        $upload_dir = 'uploads/';
        $imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array("jpeg", "jpg", "png", "gif", "pdf");
        $picProfile = rand(1000, 1000000).".".$imgExt;
        move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
        $stmt = $connect->prepare('INSERT INTO images(username, picProfile) VALUES (:uname, :upic)');
        $stmt->bindParam(':uname', $name);
        $stmt->bindParam(':upic', $picProfile);
        if($stmt->execute())
        {
            ?>
            <script>
                alert("new record successul");
                window.location.href=('photo_index.php');
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
?>
 
<!-- form insert -->
    <div>
        <div>
            <h1>Please Insert new Item image</h1>
            <form method="post" enctype="multipart/form-data">
                <label>User Name</label>
                <input type="text" name="user_name" required="">
                <label>Picture Profile</label>
                <input type="file" name="profile" required="" accept="*/image">
                <button type="submit" name="btn-add">Add New </button>
                 
            </form>
        </div>
        <hr 2px red solid;>
    </div>    
<!-- end form insert -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>