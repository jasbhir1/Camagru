// Global Vars
let width = 500,
    height = 0,
    filter = 'none',
    streaming = false;

var savePhoto = document.getElementById('dl-btn');

//sticker
var stick = document.getElementById('stick');

// DOM Elements
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const photoFilter = document.getElementById('photo-filter');

// Get media stream
navigator.mediaDevices.getUserMedia({video: true, audio: false})
  .then(function(stream) {
    // Link to the video source
    video.srcObject = stream;
    // Play video
    video.play();
  })
  .catch(function(err) {
    console.log(`Error: ${err}`);
  });

  // Play when ready
  video.addEventListener('canplay', function(e) {
    if(!streaming) {
      // Set video / canvas height
      height = video.videoHeight / (video.videoWidth / width);

      video.setAttribute('width', width);
      video.setAttribute('height', height);
      canvas.setAttribute('width', width);
      canvas.setAttribute('height', height);

      streaming = true;
    }
  }, false);

  // Photo button event
  photoButton.addEventListener('click', function(e) {
    takePicture();

    e.preventDefault();
  }, false);

  // Filter event
  photoFilter.addEventListener('change', function(e) {
    // Set filter to chosen option
    filter = e.target.value;
    // Set filter to video
    video.style.filter = filter;

    e.preventDefault(); 
  }, false);

  // Clear event
  clearButton.addEventListener('click', function(e) {
    // Clear photos
    photos.innerHTML = '';
    // Change filter back to none
    filter = 'none';
    // Set video filter
    video.style.filter = filter;
    // Reset select list
    photoFilter.selectedIndex = 0;
  }, false);

  // Take picture from canvas
  function takePicture() {
    // Create canvas
    const context = canvas.getContext('2d');
    
    if(width && height) {
      // set canvas props
      canvas.width = width;
      canvas.height = height;
      // Draw an image of the video on the canvas
      context.drawImage(video, 0, 0, width, height);
      context.drawImage(stick, 0, 0, width, height);

      // Create image from the canvas
      var imgDataUrl = canvas.toDataURL('image/png');
     
      document.querySelector('#dl-btn').href = imgDataUrl;

      // Create img element
      const img = document.createElement('img');

      // Set img src
      img.setAttribute('src', imgDataUrl);

      // Set image filter
      img.style.filter = filter;

      // Add image to photos
    }
  }

  //superimpose

  //select sticker
  var stickers = document.getElementsByClassName('sticker');
  
  stickers = Array.from(stickers);

stickers.forEach( function(sticker, i ){
    sticker.addEventListener( 'click', function(){
      stick.src = sticker.src;
    });
});