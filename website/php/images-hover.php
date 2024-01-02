<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.slideshow-container {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
}

.slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.5s ease;
}

.slide.active {
  opacity: 1;
}

.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
    </style>
</head>
<body>

<script src="../js/images-auto-rotate.js"></script>
  
<div class="slideshow-container">
  <div class="slide">
    <img src="../images/school.jpg" alt="Image 1" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/class2.webp" alt="Image 2" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/images-hover6.jpeg" alt="Image 3" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/lecHall.jpg" alt="Image 3" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/lab1.jpeg" alt="Image 3" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/hall2.jpeg" alt="Image 3" class="slide-image" />
  </div>
  <div class="slide">
    <img src="../images/classroom.jpeg" alt="Image 3" class="slide-image" />
  </div>
</div>
</body>
</html>