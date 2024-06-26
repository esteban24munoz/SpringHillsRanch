<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="icon" href="../../images/FavIcon-Hills.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/style.css" />

    <!--MENU  -->
    <script src="../js/script.js" defer></script>

    <!--NAVBAR SCRIPT -->
    <script src="../js/navBar.js" defer></script>

    <!--INDEX SCRIPT -->
    <script src="../js/index.js" defer></script>

</head>

<body>
    <header>
       <style>
        .header-container>*:not(.farm-img) {
            position: absolute;
        }

        .header-container {
            /* height: 90dvh; */
            position: relative;
        }

        .farm-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media only screen and (max-width:425px) {
            .header-container {
                height: auto;
                margin-bottom: 10px;
            }
        }
    </style>

        <!-- Navbar -->

        <div class="nav-container">
            <div class="img-box">
              <a href="index.php">
                <img src="../../images/Logo-Black.svg" alt="Logo" draggable='false' />
              </a>
            </div>

            <button class="hamburger">
                <div class="bar"></div>
            </button>

            <div class="info-container">
                <img src="../../images/placeholder.svg" width="70px" alt="placeholder" oncontextmenu='return false'/>
                <div class="info" style="padding-right: 30px;">
                    <p style="float: none">P.O BOX 488<br>
                        MT. Vernon, MO 65712</p>
                </div>
                <img src="../../images/call.svg" width="70px" alt="placeholder" oncontextmenu='return false'/>
                <div class="info">
                    <p style="float: none">417-737-BEEF (2333)</p>
                </div>
            </div>
        </div>
        <!-- Mobile Navbar -->
        <nav class="mobile-nav">
            <ul class="nav_list">
                <li class="nav_item">
                    <a href="../dynamic/index.php" id="event" class="nav_link">Home</a>
                </li>
                <li class="nav_item">
                    <a href="aboutUs.html" id="aboutUs" class="nav_link">About Us</a>
                </li>
                <li class="nav_item">
                    <a href="../dynamic/cattle.php" id="pastors" class="nav_link">Cattle</a>
                </li>
                <li class="nav_item">
                    <a href="contact.html" class="nav_link">Contact</a>
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
              <a href="aboutUs.php" id="about-Us" class="nav_link">About Us</a>
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
        const homeLink = document.getElementById('about-Us');
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

        <!-- image -->
        <div class='header-container'>
            <div class="welcome">
                <h1>About Us!</h1>
            </div>
            <img src='../../images/aboutUs-header.svg' class='farm-img' draggable='false' alt='farmer-bull' oncontextmenu='return false'>
        </div>

    </header>

    <main>

   <!-- ABOUT OUR CATTLE -->
   <section class="tsymbol">
    <div class="about-cattle reveal">
      <div class="text-wrapper">
        <h2>About Our Cattle</h2>
        <p>Meet [Bull's Name], a stunning [age]-year-old [color] [breed] bull with an impressive build and gentle temperament. This exceptional bull boasts robust health, showcasing a remarkable lineage of [mention noteworthy ancestors or bloodlines]. With a docile nature and easy handling, [Bull's Name] is trained to lead and interact well with handlers.
        </p>
      </div>
      <div class="image">
        <img src="../../images/bull-nbg.svg" alt="bull" draggable='false' oncontextmenu='return false'>
      </div>
    </div>
  </section>

      <!-- RON AND DONNA -->
      <section class="farmer-bkg">
        <div class="farmer-container reveal">
          <div class="image">
            <img src="../../images/donna&ron.jpeg" draggable='false' alt="farmer-picture" oncontextmenu='return false'>
          </div>
          <div class="text-wrapper">
            <h2>Ron & Donna <br>McNaughton</h2>
            <p>At [Farm/Ranch Name], our passion for breeding and nurturing superior livestock drives everything we do. With decades of experience in raising top-quality [breed] bulls, our commitment to excellence shines through in every aspect of our operation.
              We are a team of dedicated farmers who deeply value the art and science of breeding. Each bull we raise represents the culmination of careful selection, impeccable care, and a profound understanding of genetics. </p>
          </div>
        </div>
      </section>

        <!-- FOOTER -->
        <footer>
            <div class="foot-container">
                <div class="foot-wrapper">
                    <div class="logo-wrapper">
                        <img src="../../images/Logo-White.svg" draggable='false' alt="Logo" oncontextmenu='return false'>
                        &copy;Copyright <em>Esteban Munoz</em>
                    </div>
                    <div class="text-wrapper">
                        <a href="../dynamic/cattle.php" style="color: var(--clr-third);
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