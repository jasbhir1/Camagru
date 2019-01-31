<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EDITOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    
</head>

<body>
    <header>
        <h2><img src="https://i.imgur.com/0USNj5N.jpg" alt="camagru header"></h2>
    </header>

    <section>
        <nav>
        <?php

//home page

session_start();

if(isset($_SESSION["username"]))
{
    echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
    echo '<br /><br /><a href="update_info.php">Update user info</a>';
    echo '<br /><br /><a href="logout.php">logout now</a>';
}
else
{
    header("location:login.php");
}

?>      
        </nav>

        <article>
        <video id="video">Stream not available...</video> 
            <button id="photo-button" class="btn btn-dark">
                Take Photo
            </button>

            <select id="photo-filter" class="select">
                <option value="none">Normal</option>
                <option value="grayscale(100%)">Grayscale</option>
                <option value="sepia(100%)">Sepia</option>
                <option value="invert(100%)">Invert</option>
                <option value="hue-rotate(90deg)">Hue</option>
                <option value="blur(10px)">Blur</option>
                <option value="contrast(200%)">Contrast</option>
            </select>

            <button id="clear-button" class="btn btn-light">Clear</button>
            <canvas id="canvas"></canvas>
           
           <a id="dl-btn" href="imageDataUrl" download="glorious_selfie.png">Save Photo</a>
        </article>
        <script src="camera.js"></script>
        <div class="bottom-container">
            <div id="photos"></div>
        </div>
    </section>

    <footer>
        <p>The online community photoshop</p>
    </footer>
</body>

</html>