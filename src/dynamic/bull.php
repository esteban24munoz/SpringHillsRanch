<?php

if (isset($_GET['id'])) {
  $bullId = $_GET['id'];
} else {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content="width=device-width, initial-scale=1.0">
  <title>Cattle</title>
  <link rel="icon" href="../images/Logo-Black.svg" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
  <!-- LORDICON -->
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

  <!-- Main CSS -->
  <link rel="stylesheet" href="../css/style.css" />

  <!-- CATTLE CSS -->
  <link rel="stylesheet" href="../css/cattle.css" />

  <!--MAIN SCRIPT -->
  <script src="../js/navBar.js" defer></script>

  <!-- CATTLE SCRIPT -->
  <script src="../js/cattle.js" defer></script>


</head>

<body>
  <style>
    .carousel-section {
      background-image: none;
    }

    .carousel-section .title-container {
      background: none;
      padding-top: 0px;
      min-height: 330px;
    }

    .carousel-section .title-container h2 {
      color: #3e1309;

    }
  </style>
  <header>
    <!-- Navbar -->

    <div class="nav-container">
      <div class="img-box">
        <a href="index.php">
          <img src="../../images/Logo-Black.svg" alt="Logo" />
        </a>
      </div>

      <button class="hamburger">
        <div class="bar"></div>
      </button>

      <div class="info-container">
        <img src="../../images/placeholder.svg" width="70px" alt="placeholder" />
        <div class="info" style="padding-right: 30px;">
          <p style="float: none">P.O BOX 488<br>
            MT. Vernon, MO 65712</p>
        </div>
        <img src="../../images/call.svg" width="70px" alt="placeholder" />
        <div class="info">
          <p style="float: none">417-737-BEEF (2333)</p>

        </div>
      </div>
    </div>
    <!-- Mobile Navbar -->
    <nav class="mobile-nav">
      <ul class="nav_list">
        <li class="nav_item">
          <a href="index.php" id="event" class="nav_link">Home</a>
        </li>
        <li class="nav_item">
          <a href="../static/aboutUs.html" id="aboutUs" class="nav_link">About Us</a>
        </li>
        <li class="nav_item">
          <a href="cattle.php" id="pastors" class="nav_link">Cattle</a>
        </li>
        <li class="nav_item">
          <a href="../static/contact.html" class="nav_link">Contact</a>
        </li>
      </ul>
    </nav>



    <!-- Navbar LINKS -->
    <div class="nav-background">
      <div class="nav-links">
        <ul class="nav_list">
          <li class="nav_item">
            <a href="index.php" id="event" class="nav_link">Home</a>
          </li>
          <li class="nav_item">
            <a href="../static/aboutUs.html" id="aboutUs" class="nav_link">About Us</a>
          </li>
          <li class="nav_item">
            <a href="cattle.php" id="pastors" class="nav_link">Cattle</a>
          </li>
          <li class="nav_item">
            <a href="../static/contact.html" class="nav_link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </header>

  <main>

    <section class="product-ctn-1" style="padding: 80px;">

      <?php
      //CONNECT TO DATABASE
      $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

      $sql = "SELECT * FROM bulls_db WHERE id = $bullId";

      $result = $mysqli->query($sql);

      while ($row = $result->fetch_assoc()) {

        echo "
  <!-- BULLS IN SALE -->
  <div class='bull-product-1'>
      <!-- eCommerce gallery -->
      <div class='product-gallery'>

        <div class='main-img-ctn'>
        <img src='$row[main_img]' class='bull-product' id='mainImg' width='600px' height='400px' alt='bull-product'>
        </div>

        <!-- Small img container -->
        <div class='small-img-ctn'>
          <div class='small-img-col'>
            <img src='$row[main_img]' class='small-img' alt='bull-product'>
          </div>
          <div class='small-img-col'>
            <img src='$row[img_1]' class='small-img' alt='bull-product'>
          </div>
          <div class='small-img-col'>
            <img src='$row[img_2]' class='small-img' alt='bull-product'>
          </div>
          <div class='small-img-col'>
            <img src=$row[img_3] class='small-img' alt='bull-product'>
          </div>
        </div>

            <!-- SHOW UP-SMALL SCREEN -->
        <div class='learn-smallBtn'>
          <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=4708639' target='_blank'>
            <button>
              LEARN MORE
            </button>
          </a>
        </div>
      </div>

      <!-- INFO CONTAINER -->
      <div class='info-ctn'>
        <h2 class='bullName'>$row[bullName]</h2>
        <h3 class='raaa'>RAAA#: $row[raaa]</h3>
        <h4 class='dob'>DOB: $row[dob]</h4>

        <!-- FOR SALE -->
        <div class='forSale-btn'>
          <h5 class='phone-number'>FOR SALE</h5>
          <p class='phone-icon'>$ Call for Pricing</p>
          <lord-icon
              id='hidePhoneIcon'
              src='https://cdn.lordicon.com/rsvfayfn.json'
              trigger='hover'
              colors='primary:#ffffff'
              style='width:50px;height:50px; display: none'>
             </lord-icon>
        </div>

        <!-- LEARN MORE -->
        <div class='learnMore-btn'>
          <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=4708639' target='_blank'>
            <button>
              LEARN MORE
            </button>
          </a>  
        </div>
      </div>

      <!-- SMALL SCREEN -->
      <div class='info-small-screen'>
        <h2 class='bullName'>$row[bullName]</h2>
          <div class='info-wrap'>
            <div class='text-wrap'>
              <h3 class='raaa'>
                RAAA#: $row[raaa]</h3>
              <h4 class='dob'>DOB: $row[dob]</h4>
            </div>
            <!-- FOR SALE -->
            <div class='forSale-btn forSale-s-btn'>
              <h5>FOR SALE</h5>
              <p>$ Call for Pricing</p>
            </div>
        </div>
      </div>
  </div>
  <hr style='width:100%;text-align:left;margin: 50px 0px;height:2px;border-width:0;color:gray;background-color:gray;'>
  ";
      }

      ?>
      <!-- RANCHERS GUIDE -->
      <div class="rancher-guide" style="padding:20px">
        <p>Want to know more about EPD’S?
          <a class="guide-link" href="RAAA_Guide-to-EPDs.pdf" target="_blank">Ranchers Guide to EPD’S</a>
        </p>
      </div>

    </section>
    <!-- BULLS CARDS -->
    <section class="carousel-section">
      <div class="title-container">
        <h2>MORE BULLS</h2>
        <a href="cattle.php" style="font-weight: 400;color: #3e1309;">View all the bulls</a>
      </div>

      <div class="carousel-container">
        <div class="wrapper">
          <i class="fa-solid fa-chevron-left" id="left"></i>
          <ul class="carousel">

            <?php
            //CONNECT TO DATABASE
            $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

            $sql = "SELECT * FROM bulls_db";

            $result = $mysqli->query($sql);

            while ($row = $result->fetch_assoc()) {

              echo "
          <li class='card'>
            <div class='photo'>
              <img src='$row[main_img]' alt='bull' draggable='false' width='400px' height='300px'>
            </div>
            <h2 style='user-select: none'>$row[bullName]</h2>

            <div class='raaaInfo'>
              <p>RAAA#: $row[raaa]  
              <lord-icon
              src='https://cdn.lordicon.com/oqdmuxru.json'
              trigger='hover'
              colors='primary:#ffffff'
              style='width:25px;height:25px'>
              </lord-icon>
              </p>
            </div>    
            <a href='bull.php?id=$row[id]'> 
            <button class='readMore-btn'>
              Read More
            </button>
            </a>
 
          </li>
          ";
            }
            ?>
          </ul>
          <i class="fa-solid fa-chevron-right" id="right"></i>
        </div>
      </div>
    </section>

  </main>
  <!-- FOOTER -->
  <footer>
    <div class="foot-container">
      <div class="foot-wrapper">
        <div class="logo-wrapper">
          <img src="../../images/Logo-White.svg" alt="Logo">
          &copy;Copyright <em>Esteban Munoz</em>
        </div>
        <div class="text-wrapper">
          <a href="cattle.php" style="color: var(--clr-third);
              padding-bottom: 20px;
              display: block;">
            View all the bulls</a>
          <p>417-737-BEEF (2333)</p>
          <p>SpringHillsRanch@gmail.com</p>
          <p>P.O. Box 488, MT. Vernon, MO 65712</p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>