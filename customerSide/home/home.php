<?php include_once('../components/header.php')?>
<!-- Hero Section with Video Background and Text Overlay -->
<section id="hero" style="position: relative;">
    <img src="../image/hero-slider-4.jpg" alt="Gallery Cafe" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
    <div class="hero container" style="position: relative; z-index: 1; text-align: center; padding-top: 200px;">
        <div>
            <h1 class="text-center animated fadeInDown" style="font-family:Copperplate; color:whitesmoke;">Gallery Cafe</h1>
            <h1 class="animated fadeInUp"><strong style="color:white;">Delicious Foods & Drinks<span></span></strong></h1>
            <a href="./menu.php" type="button" class="cta" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #ff6347; color: white; text-decoration: none; font-size: 1.2em; border-radius: 5px;">MENU</a>
        </div>
    </div>
</section>
<style>
  @keyframes fadeInDown {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animated {
    animation-duration: 1s;
    animation-fill-mode: both;
}

.fadeInDown {
    animation-name: fadeInDown;
}

.fadeInUp {
    animation-name: fadeInUp;
}

</style>

<!-- End Hero Section -->


      
      
    

<?php 
include_once('../components/footer.php');
?>