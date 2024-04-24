<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <title>Cattle</title>
  <link rel="icon" href="../../images/FavIcon-Hills.svg" />

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
  <header>
    <!-- Navbar -->

    <div class="nav-container">
      <div class="img-box">
        <a href="index.php">
          <img src="../../images/Logo-Black.svg" alt="Logo" draggable='false'/>
        </a>
      </div>

      <button class="hamburger">
        <div class="bar"></div>
      </button>

      <div class="info-container">
        <img src="../../images/placeholder.svg" width="70px" alt="placeholder" oncontextmenu='return false' draggable='false'/>
        <div class="info" style="padding-right: 30px;">
          <p style="float: none">P.O BOX 488<br>
            MT. Vernon, MO 65712</p>
        </div>
        <img src="../../images/call.svg" width="70px" alt="placeholder" oncontextmenu='return false' draggable='false'/>
        <div class="info">
          <p style="float: none">417-737-BEEF (2333)</p>

        </div>
      </div>
    </div>
    <!-- Mobile Navbar -->
    <nav class="mobile-nav">
      <ul class="nav_list">
        <li class="nav_item">
          <a href="index.php" id="anchorColor" class="nav_link">Home</a>
        </li>
        <li class="nav_item">
          <a href="aboutUs.php" id="anchorColor" class="nav_link">About Us</a>
        </li>
        <li class="nav_item">
          <a href="cattle.php" id="anchorColor" class="nav_link">Cattle</a>
        </li>
        <li class="nav_item">
          <a href="contactUs.php" class="nav_link" id="anchorColor">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Navbar LINKS -->
    <div class="nav-background">
      <div class="nav-links">
        <ul class="nav_list">
          <li class="nav_item">
            <a href="index.php" id="home" class="nav_link">Home</a>
          </li>
          <li class="nav_item">
            <a href="aboutUs.php" id="aboutUs" class="nav_link">About Us</a>
          </li>
          <li class="nav_item">
            <a href="cattle.php" id="cattle" class="nav_link">Cattle</a>
          </li>
          <li class="nav_item">
            <a href="contactUs.php" id="contact" class="nav_link">Contact</a>
          </li>
        </ul>
      </div>
    </div>

    <script>
      const homeLink = document.getElementById('cattle');
      const navLinks = document.querySelectorAll('.nav_link');

      homeLink.style.color = '#d1b480';

      navLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          homeLink.style.color = 'white';
          link.style.transition = 'color 0.3s ease';
          link.style.color = '#d1b480';
        });

        link.addEventListener('mouseout', () => {
          homeLink.style.color = '#d1b480';
          link.style.transition = 'color 0.3s ease';
          link.style.color = '';
        });
      });
    </script>



    <!-- Head Img -->
    <div class='header-container'>
      <div class="welcome">
        <h1>The Best<br>of Our Cattle</h1>
      </div>
      <img src='../../images/cattle-header.svg' draggable='false' draggable='false'  class="farm-img" alt='farmer-bull' oncontextmenu='return false'>
    </div>

  </header>

  <main>
    <!-- RANCHERS GUIDE -->
    <div class="rancher-guide">
      <p>Want to know more about EPD’S?
        <a class="guide-link" href="RAAA_Guide-to-EPDs.pdf" target="_blank">Ranchers Guide to EPD’S</a>
      </p>
    </div>

    <section class="product-ctn-1">

      <?php
      $count = 0;

      //CONNECT TO DATABASE
      $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

      $sql = "SELECT * FROM bulls_db";

      $result = $mysqli->query($sql);

      while ($row = $result->fetch_assoc()) {

        // Increment the counter
        $count++;

        // Determine odd/even class based on counter
        $class = ($count % 2 == 0) ? 'even' : 'odd';


        echo "
    <!-- BULLS IN SALE -->
    <div class='bull-product-1 $class'>
        <!-- eCommerce gallery -->
        <div class='product-gallery'>

          <div class='main-img-ctn'>
            <img src='$row[main_img]' class='bull-product' id='mainImg$row[raaa]' width='600px' height='400px' alt='bull-product' draggable='false' oncontextmenu='return false'>
          </div>

          <!-- Small img container -->
          <div class='small-img-ctn'>
            <div class='small-img-col'>
              <img src='$row[main_img]' draggable='false' class='small-img' alt='bull-product' oncontextmenu='return false'>
            </div>
            <div class='small-img-col'>
              <img src='$row[img_1]' class='small-img' draggable='false' alt='bull-product' oncontextmenu='return false'>
            </div>
            <div class='small-img-col'>
              <img src='$row[img_2]' class='small-img' draggable='false' alt='bull-product' oncontextmenu='return false'>
            </div>
            <div class='small-img-col'>
              <img src=$row[img_3] class='small-img' draggable='false' alt='bull-product' oncontextmenu='return false'>
            </div>
          </div>

              <!-- SHOW UP-SMALL SCREEN -->
          <div class='learn-smallBtn'>
            <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=$row[raaa]' target='_blank'>
              <button class='btn-wrapper'>
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
          <div class='forSale-btn' id='forSaleId'>
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
            <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=$row[raaa]' target='_blank'>
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

      <!-- GALLERY SCRIPT -->
      <script>
        let galleries = document.querySelectorAll('.product-gallery');

        galleries.forEach((gallery) => {

          let mainImg = gallery.querySelector('img[id^="mainImg"]');
          let smallImages = gallery.querySelectorAll('.small-img');
          let currentSmallImg = null;

          smallImages.forEach((smallImg) => {

            smallImg.addEventListener('click', function() {
              //Checks if there's a previously selected small image
              if (currentSmallImg) {
                currentSmallImg.style.opacity = "1";
              }

              //Set opacity and image on display
              // Add smooth transition effect
              smallImg.style.opacity = "0.7";

              mainImg.src = smallImg.src;
              currentSmallImg = smallImg;
              smallImg.style.transition = "opacity 1s";
            });

            smallImg.style.opacity = "1";

          });
        });
      </script>

    </section>

    <footer>
      <div class="foot-container">
        <div class="foot-wrapper">
          <div class="logo-wrapper">
            <img src="../../images/Logo-White.svg" alt="Logo" oncontextmenu='return false' draggable='false'>
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

  </main>

</body>

</html>