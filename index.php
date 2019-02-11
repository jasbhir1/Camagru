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
    echo '<br /><br /><a href="personal_gallery.php">View Personal Gallery</a>';
    echo '<br /><br /><a href="photo_index.php">Upload a picture from pc</a>';
    echo '<br /><br /><a href="gallery.php">View Camagru Gallery</a>';
    echo '<br /><br /><a href="delete_image.php">Delete a picture?</a>';
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
            <!-- The social media icon bar -->
            <div class="icon-bar">     
                <img class='sticker' src="https://clipart.info/images/ccovers/1496184260OMG-Emoji-Png-transparent-background.png" style="width:42px;height:42px;border:0;"> 
                <img class='sticker' src="https://images.vexels.com/media/users/3/134594/isolated/preview/cb4dd9ad3fa5ad833e9b38cb75baa18a-happy-emoji-emoticon-by-vexels.png" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://cdn.shopify.com/s/files/1/1061/1924/files/Sunglasses_Emoji.png?2976903553660223024" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://i.pinimg.com/originals/03/7e/79/037e79b2fb52127537be79110891ae3f.png" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://data.whicdn.com/images/235390705/superthumb.jpg?t=1460855684" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="http://www.stickpng.com/assets/images/5897a709cba9841eabab614e.png" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://clipart.info/images/ccovers/1496184257Hugging-Emoji-png-transparent-Icon.png" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpmCgmCGmVMimKAyaFAUf0JKbEv3GgDM9mhjyV063Jv0cl93e2" style="width:42px;height:42px;border:0;">
                <img class='sticker' src="https://clipart.info/images/ccovers/1496184258Devil-Emoji-png-transparent-Icon.png" style="width:42px;height:42px;border:0;">
                <img class='sticker' style="width:42px;height:42px;">

                </div>

            <button id="clear-button" class="btn btn-light">Clear</button>
            <div class="canvas-element">
                <canvas id="canvas"></canvas>
                <img id='stick' style="width:42px;height:42px;">

            </div>
           
           <a id="dl-btn" href="imageDataUrl" download="camagru_selfie.png">Save Photo</a>
           <?php
        print_r();
           ?>
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


