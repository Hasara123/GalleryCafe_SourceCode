<?php include 'includes/header.php'; ?>
<main>
        <section class="about-us" style="background-color: white;">
        <div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_5terre.jpg">
      <img src="/assets/image/gallery-4.jpg" alt="Cinque Terre">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="/assets/image/gallery-1.jpg" alt="Forest">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="/assets/image/gallery-2.jpg" alt="Northern Lights">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="/assets/image/gallery-3.jpg" alt="Mountains">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="clearfix"></div>      
        </section>
    </main>

<style>
/* Main gallery container */
.gallery-container {
  background-color: white;
  padding: 20px;
}

/* Individual gallery items */
div.gallery {
  border: 1px solid #ccc;
  transition: border 0.3s ease-in-out, transform 0.3s ease-in-out;
}

div.gallery:hover {
  border: 1px solid #777;
  transform: scale(1.05);
}

div.gallery img {
  width: 100%;
  height: 600px; /* Increased height for larger images */
  object-fit: cover; /* Ensure images cover the area and maintain aspect ratio */
}

div.desc {
  padding: 15px;
  text-align: center;
  font-family: 'Arial', sans-serif;
  font-size: 14px;
  color: #333;
}

/* Box sizing for all elements */
* {
  box-sizing: border-box;
}

/* Responsive gallery item */
.responsive {
  padding: 0 6px;
  float: left;
  width: 33.33333%; /* Increased width for larger gallery items */
}

@media only screen and (max-width: 800px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 800px) {
  .responsive {
    width: 100%;
  }
}

/* Clearfix for container */
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

</style>
