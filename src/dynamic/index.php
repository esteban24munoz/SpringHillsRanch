<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  // Include PHPMailer classes
  require 'phpmailer/phpmailer/src/Exception.php';
  require 'phpmailer/phpmailer/src/PHPMailer.php';
  require 'phpmailer/phpmailer/src/SMTP.php';

  try {
    // Sanitize values
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $emailSent = "";

    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'munozelie24@gmail.com';
    $mail->Password   = 'olazayadcxaipiuk';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('munozelie24@gmail.com', $name);
    $mail->addAddress('munozelie24@gmail.com');
    $mail->addReplyTo($email, $name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    // Success sent message alert
    if ($mail->send()) {
      $emailSent = "Email has been sent!";
    } else {
      echo "Unable to send email :(";
    }
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no">
  <title>Spring Hills Ranch</title>
  <link rel="icon" href="../../images/FavIcon-Hills.svg" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />

  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

  <!-- LORDICON -->
  <script src="https://cdn.lordicon.com/lordicon.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="../css/style.css" />

  <!--NAVBAR SCRIPT -->
  <script src="../js/navBar.js" defer></script>

  <!--BULL CARDS SCRIPT  -->
  <script src="../js/carousel.js" defer></script>

  <!--INDEX SCRIPT  -->
  <script src="../js/index.js" defer></script>

  <style>
    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #3e1309;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }

    #myBtn:hover {
      background-color: #555;
    }
  </style>

</head>

<body>
  <header>

    <!-- NAVBAR -->
    <div class='nav-container'>
      <div class='img-box'>
        <img src='../../images/Logo-Black.svg' alt='Logo' draggable="false" draggable="false"/>
      </div>

      <button class='hamburger'>
        <div class='bar'></div>
      </button>

      <div class='info-container'>
        <img src='../../images/placeholder.svg' width='70px' alt='placeholder' oncontextmenu='return false' draggable="false"/>
        <div class='info' style='padding-right: 30px;'>
          <p style='float: none;'>P.O BOX 488<br>
            MT. Vernon, MO 65712</p>
        </div>
        <img src='../../images/call.svg' width='70px' alt='placeholder' oncontextmenu='return false' draggable="false"/>
        <div class='info'>
          <p style='float: none'>417-737-BEEF (2333)</p>
        </div>
      </div>
    </div>

    <!-- MOBILE  NAV-BAR -->
    <nav class='mobile-nav'>
      <ul class="nav_list">
        <li class="nav_item">
          <a href="index.php" id="linkEvent" class="nav_link">Home</a>
        </li>
        <li class="nav_item">
          <a href="aboutUs.php" id="linkEvent" class="nav_link">About Us</a>
        </li>
        <li class="nav_item">
          <a href="cattle.php" id="linkEvent" class="nav_link">Cattle</a>
        </li>
        <li class="nav_item">
          <a href="contactUs.php" id="linkEvent" class="nav_link">Contact</a>
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
      const homeLink = document.getElementById('home');
      const navLinks = document.querySelectorAll('.nav_link');

      homeLink.style.color = '#d1b480';

      navLinks.forEach(link => {
        link.addEventListener('mouseover', () => {
          homeLink.style.color = 'white';
          link.style.transition = 'color 0.4s ease';
          link.style.color = '#d1b480';
        });

        link.addEventListener('mouseout', () => {
          homeLink.style.color = '#d1b480';
          link.style.transition = 'color 0.4s ease';
          link.style.color = '';
        });
      });
    </script>


    <!-- video -->
    <div class="myVideo">
      <div class="welcome">
        <h1 class="">Welcome to Our <br>Ranch</h1>
      </div>
      <video class="farm-video" autoplay muted playsinline loop oncontextmenu="return false">
        <source src="../../video/Ranch-Stabilized-Video.mp4" type="video/mp4" />
      </video>
    </div>

  </header>

  <main>
    <!-- BULLS CARDS -->

    <section class="carousel-section">
      <div class="title-container">
        <h2 class="reveal">OUR BEST BULLS</h2>
        <a href="cattle.php" class="reveal" style="font-weight: 400;color: white;">View all the bulls</a>
      </div>

      <div class="carousel-container reveal">
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
              <img src='$row[main_img]' alt='bull' draggable='false' width='400px' height='300px' oncontextmenu='return false'>
            </div>
            <h2 style='user-select: none'>$row[bullName]</h2>

            <div class='raaaInfo'>
              <p>RAAA#: $row[raaa]
              <span>
              <lord-icon
              src='https://cdn.lordicon.com/oqdmuxru.json'
              trigger='hover'
              colors='primary:#ffffff'
              style='width:25px;height:25px'>
              </lord-icon>
            </span>
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

    <!-- w3school -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="topArrow" viewBox="0 0 24 24" style='fill: white;'>
        <path d="M11 8.414V18h2V8.414l4.293 4.293 1.414-1.414L12 4.586l-6.707 6.707 1.414 1.414z"></path>
      </svg>
    </button>

    <!-- ABOUT OUR CATTLE -->
    <section class="tsymbol">
      <div class="about-cattle reveal">
        <div class="text-wrapper">
          <h2>About Our Cattle</h2>
          <p>Meet [Bull's Name], a stunning [age]-year-old [color] [breed] bull with an impressive build and gentle temperament. This exceptional bull boasts robust health, showcasing a remarkable lineage of [mention noteworthy ancestors or bloodlines]. With a docile nature and easy handling, [Bull's Name] is trained to lead and interact well with handlers.
          </p>
        </div>
        <div class="image">
          <img src="../../images/bull-nbg.svg" alt="bull" oncontextmenu='return false' draggable="false">
        </div>
      </div>
    </section>
    <!-- MESSAGE -->
    <section class="reveal">
      <div class="img-container">
        <img src="../../images/bullgrass.jpg" alt="bull" oncontextmenu='return false' draggable="false">
        <div class="message">
          <h2>Grown on<br>
            Fescue Grass</h2>
        </div>
      </div>
    </section>
    <!-- RON AND DONNA -->
    <section class="farmer-bkg">
      <div class="farmer-container reveal">
        <div class="image">
          <img src="../../images/donna&ron.jpeg" alt="farmer-picture" oncontextmenu='return false' draggable="false">
        </div>
        <div class="text-wrapper">
          <h2>Ron & Donna <br>McNaughton</h2>
          <p>At [Farm/Ranch Name], our passion for breeding and nurturing superior livestock drives everything we do. With decades of experience in raising top-quality [breed] bulls, our commitment to excellence shines through in every aspect of our operation.
            We are a team of dedicated farmers who deeply value the art and science of breeding. Each bull we raise represents the culmination of careful selection, impeccable care, and a profound understanding of genetics. </p>
        </div>
      </div>
    </section>
    <!-- CONTACT US -->

    <section class="reveal" id="action">
      <div class="contact-container">
        <div class="form-wrapper">
          <h3>Contact <span style="color: #578b5a">Us!</span></h3>

          <?php
          if (isset($emailSent)) {
            echo "
                <div style='display:flex;justify-content:center;'>
                  <div style='color:#578b5a;text-align:center'>
                    <h4>{$emailSent}</h4>
                  </div>
                </div>";
          }
          ?>
          <form action='index.php#action' method='post'>
            <p>
              <label for='client'></label>
              <input class='rounded-input' type='text' id='client' name='name' placeholder='Name' required />
            </p>
            <p>
              <label for='email'></label>
              <input class='rounded-input' type='email' id='email' name='email' placeholder='Email' required />
            </p>
            <p>
              <label for='subject'></label>
              <input class='rounded-input' type='text' id='subject' name='subject' placeholder='Bull prices, Questions?' required />
            </p>
            <p>
              <label for='message'></label>
              <textarea class='rounded-input' id='message' class='rounded_input' name='message' placeholder='I am interested about...' rows='7' cols='50'></textarea>
            </p>
            <p>
              <input type='submit' class='submit-btn rounded-input' name='Submit' value='Submit' />
            </p>
          </form>
        </div>
        <!-- IMAGES -->
        <div class="image-wrapper">
          <img src="../../images/farm-pic-1.svg" alt="farm picture" oncontextmenu='return false' draggable="false"/>
          <img src="../../images/farm-pic-2.svg" alt="farm picture" oncontextmenu='return false' draggable="false"/>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer>
      <div class="foot-container">
        <div class="foot-wrapper">
          <div class="logo-wrapper">
            <img src="../../images/Logo-White.svg" alt="Logo" oncontextmenu='return false'>
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

  <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction()
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      });

    }
  </script>
</body>

</html>