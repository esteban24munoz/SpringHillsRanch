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
  <link rel="stylesheet" href="cattle.css" />

  <!--MAIN SCRIPT -->
  <script src="../js/script.js" defer></script>

  <!-- CATTLE SCRIPT -->
  <script src="cattle.js" defer></script>


</head>

<body>
  <header>
    <!-- Navbar -->

    <div class="nav-container">
      <div class="img-box">
        <img src="../../images/Logo-Black.svg" alt="Logo" />
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

    <!-- Head Img -->
    <div class='header-container'>
      <div class="welcome">
        <h1>The Best<br>of Our Cattle</h1>
      </div>
      <img src='../../images/cattle-header.svg' class="farm-img" alt='farmer-bull'>
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

  //CONNECT TO DATABASE
 
  
  $mysqli = new mysqli ("localhost", "emunoz1", "H01761792", "emunoz1");
  
  $sql = "SELECT * FROM bulls_db";

  $result = $mysqli->query($sql);

  while($row = $result->fetch_assoc()){ 

    
      echo "
    <!-- BULLS IN SALE -->
    <div class='bull-product-1'>
        <!-- eCommerce gallery -->
        <div class='product-gallery'>
          <img src='$row[main_img]' class='bull-product' id='mainImg' alt='bull-product'>

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
              <img src='$row[img_2]' class='small-img' alt='bull-product'>
            </div>
          </div>

              <!-- SHOW UP-SMALL SCREEN -->
          <div class='learn-smallBtn'>
            <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=4708639' target='_blank'>LEARN MORE</a>
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
            <a href='https://zebu.redangus.org:8443/redspro/redspro/template/animalSearch%2CAnimalSearch.vm/action/animalSearch.AnimalSearchAction;jsessionid=0HGp1cIffKYlZ1QasfI_Ld9ATKgNc3a6-SSUshKT?eventSubmit_performAnimalSearch=exact&animalNumbers=4708639' target='_blank'>LEARN MORE</a>
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
    ";
  }

      ?>

      <!-- GALLERY SCRIPT -->
      <script>
        let mainImg = document.getElementById('mainImg');
        let smallImg = document.querySelectorAll('.small-img');

        smallImg[0].addEventListener('click', function() {
          mainImg.src = smallImg[0].src;
        });

        // smallImg[0].addEventListener('blur', function(){
        //     smallImg[0].style.opacity = 1;
        // });

        smallImg[1].addEventListener('click', function() {
          mainImg.src = smallImg[1].src;

        });

        smallImg[2].addEventListener('click', function() {
          mainImg.src = smallImg[2].src;
        });

        smallImg[3].addEventListener('click', function() {
          mainImg.src = smallImg[3].src;
        });
      </script>
    </section>

  </main>

</body>

</html>