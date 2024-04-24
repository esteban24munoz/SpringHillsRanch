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
    <title>Contact Us</title>
    <link rel="icon" href="../../images/FavIcon-Hills.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

    <!-- CSS -->
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
                height: 90dvh;
                position: relative;
                margin-bottom: 80px;
            }

            .farm-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
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
                <a href="../dynamic/index.php">
                    <img src="../../images/Logo-Black.svg" alt="Logo" draggable='false'/>
                </a>
            </div>

            <button class="hamburger">
                <div class="bar"></div>
            </button>

            <div class="info-container">
                <img src="../../images/placeholder.svg" width="70px" alt="placeholder" oncontextmenu='return false' />
                <div class="info" style="padding-right: 30px;">
                    <p style="float: none">P.O BOX 488<br>
                        MT. Vernon, MO 65712</p>
                </div>
                <img src="../../images/call.svg" width="70px" alt="placeholder" draggable='false' oncontextmenu='return false' />
                <div class="info">
                    <p style="float: none">417-737-BEEF (2333)</p>
                </div>
            </div>
        </div>
        <!-- Mobile Navbar -->
        <nav class="mobile-nav">
            <ul class="nav_list">
                <li class="nav_item">
                    <a href="../dynamic/index.php" id="anchorColor" class="nav_link">Home</a>
                </li>
                <li class="nav_item">
                    <a href="aboutUs.html" id="anchorColor" class="nav_link">About Us</a>
                </li>
                <li class="nav_item">
                    <a href="../dynamic/cattle.php" id="anchorColor" class="nav_link">Cattle</a>
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
      const homeLink = document.getElementById('contact');
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
                <h1>Let's get<br>in touch!</h1>
            </div>
            <img src='../../images/contactUs-header.svg' class="farm-img" draggable='false' alt='farmer-bull' oncontextmenu='return false'>
        </div>

    </header>

    <main>
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

                    <form action="contactUs.php#action" method="post">
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
                            <textarea class="rounded-input" id="message" class="rounded_input" name="message" placeholder="I am interested about..." rows="7" cols="50"></textarea>
                        </p>
                        <p>
                            <input type="submit" class="submit-btn rounded-input" name="Submit" value="Submit" />
                        </p>
                    </form>
                </div>
                <div class="image-wrapper">
                    <img src="../../images/farm-pic-1.svg" draggable='false' alt="farm picture" oncontextmenu='return false' />
                    <img src="../../images/farm-pic-2.svg" draggable='false' alt="farm picture" oncontextmenu='return false' />
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer>
            <div class="foot-container">
                <div class="foot-wrapper">
                    <div class="logo-wrapper">
                        <img src="../../images/Logo-White.svg" alt="Logo" draggable='false' oncontextmenu='return false'>
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