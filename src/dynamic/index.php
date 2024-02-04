<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spring Hills Ranch</title>
    <link rel="icon" href="../images/Logo-Black.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css" />

    <!--MENU SCRIPT -->
    <script src="../js/script.js" defer></script>
      

    <!--BULL CARDS SCRIPT  -->
    <script src="../js/carousel.js" defer></script>
          
  </head>
  <body>
    <header>
      <!-- Navbar -->
    
      <div class="nav-container">
        <div class="img-box">
          <img src="../../images/Logo-Black.svg" alt="Logo"/>
        </div>

        <button class="hamburger">
          <div class="bar"></div>
        </button>

        <div class="info-container">
          <img src="../../images/placeholder.svg" width="70px" alt="placeholder"/>
          <div class="info" style="padding-right: 30px;">
            <p style="float: none">P.O BOX 488<br>
              MT. Vernon, MO 65712</p>
          </div>
          <img src="../../images/call.svg" width="70px" alt="placeholder"/>
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

    <!-- video -->
    <div class="myVideo">
      <div class="welcome">
        <h1>Welcome to Our <br>Ranch</h1>
      </div>
      <video class="farm-video" autoplay muted loop>
        <source src="../../video/Ranch-Video.mp4" type="video/mp4" />
      </video>
    </div>
    
    </header>

    <!-- BULLS CARDS -->
    <section>
      <div class="bull-container">
        <h2>OUR BEST BULLS</h2>
        <p style="font-weight: 400;">Best bulls you have ever seen</p>
      </div>

      <div class="carousel-container">
      <div class="wrapper">
        <i class="fa-solid fa-chevron-left" id="left"></i>
        <ul class="carousel">
          <li class="card">
            <div class="photo">
              <img src="../../images/card-1.jpg" alt="bull" draggable="false">
            </div>
            <h2>Mr. Cherokee - K14</h2>
            <p>Buy this bull!</p>
          </li>
          <li class="card">
            <div class="photo">
              <img src="../../images/card-2.jpg" alt="bull" draggable="false">
            </div>
            <h2>Mr. Easy Select - K16</h2>
            <p>Buy this bull!</p>
          </li>
          <li class="card">
            <div class="photo">
              <img src="../../images/card-3.jpg" alt="bull" draggable="false">
            </div>
            <h2>Mr. Easy Mission - K21</h2>
            <p>Buy this bull!</p>
          </li>
        </ul>
        <i class="fa-solid fa-chevron-right" id="right"></i>
      </div>
    </div>
    </section>
    
    <!-- ABOUT OUR CATTLE -->
    <section>
      <div class="about-cattle">
        <div class="text-wrapper">
          <h2>About Our Cattle</h2>
          <p>Meet [Bull's Name], a stunning [age]-year-old [color] [breed] bull with an impressive build and gentle temperament. This exceptional bull boasts robust health, showcasing a remarkable lineage of [mention noteworthy ancestors or bloodlines]. With a docile nature and easy handling, [Bull's Name] is trained to lead and interact well with handlers.
          </p>
        </div>
        <div class="image">
          <img src="../../images/bull-nbg.svg" alt="bull">
        </div>
      </div>
    </section>
    <!-- MESSAGE -->
    <section>
      <div class="img-container">
        <img src="../../images/bullgrass.jpg" alt="bull">
        <div class="message">
          <h2>Grown on<br>
            Fescue Grass</h2>
        </div>
      </div>
    </section>
    <!-- RON AND DONNA -->
    <section class="farmer-bkg">
      <div class="farmer-container">
        <div class="image">
          <img src="../../images/donna&ron.jpeg" alt="farmer-picture">
        </div>
        <div class="text-wrapper">
          <h2>Ron & Donna <br>McNaughton</h2>
          <p>At [Farm/Ranch Name], our passion for breeding and nurturing superior livestock drives everything we do. With decades of experience in raising top-quality [breed] bulls, our commitment to excellence shines through in every aspect of our operation.
            We are a team of dedicated farmers who deeply value the art and science of breeding. Each bull we raise represents the culmination of careful selection, impeccable care, and a profound understanding of genetics. </p>
        </div>
      </div>
    </section>
    <!-- CONTACT US -->

    <!-- TESTING PENDING -->
    <section>
      <div class="contact-container">
        <div class="form-wrapper">
        <h3>Contact <span style="color: #578b5a">Us!</span></h3>

          <form action="mailto:emunoz1@harding.edu" method="post">
            <p>
              <label for="client"></label>
              <input class="rounded-input" type="text" id="client" name="name" placeholder="Name" required />
            </p>
            <p>
              <label for="email"></label>
              <input class="rounded-input" type="email" id="email" name="email" placeholder="Email" required />
            </p>
            <p>
              <label for="subject"></label>
              <input class="rounded-input" type="text" id="subject" name="subject" placeholder="Bull prices, Questions?" required />
            </p>
            <p>
              <label for="message"></label>
              <textarea
                class="rounded-input"
                id="message"
                class="rounded_input"
                name="message"
                placeholder="I am interested about..."
                rows="7"
                cols="50"
              ></textarea>
            </p>
            <p>
              <input type="submit" class="submit-btn rounded-input" value="Submit" />
            </p>
          </form>
        </div>
        <div class="image-wrapper">
          <img src="../../images/farm-pic-1.svg" alt="farm picture"/>
          <img src="../../images/farm-pic-2.svg" alt="farm picture"/>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <section>
      <footer>
        <div class="foot-container">
          <img class="bkg-farm" src="../../images/farm-footer.svg" alt="cows">
          <div class="foot-wrapper">
            <div class="logo-wrapper">
              <img src="../../images/Logo-White.svg" alt="Logo">
              &copy;Copyright <em>Esteban Munoz</em>
            </div>
            <div class="text-wrapper">
              <p>Back to the top</p>
               <p>417-737-BEEF (2333)</p> 
               <p>SpringHillsRanch@gmail.com</p> 
               <p>P.O. Box 488</p> 
            </div>
          </div>          
        </div>
      </footer>

    </section>

  </body>
</html>
