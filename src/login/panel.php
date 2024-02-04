<?php

session_start();
if (!isset($_SESSION['username'])) {
    //user has not authenticated
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <link rel="icon" href="../images/Logo-Black.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="login.css">

    <style>
        h1 {
            padding: 40px 80px;
            font-size: clamp(2rem, 5vw, 2.5rem);
            font-family: "Roboto Serif", serif;
        }

        .removeBull-ctn p {
            padding: 20px;
            font-size: clamp(0.9rem, 3vw, 1.2rem);
        }

        .addBull-ctn p{
            padding: 5px;
            font-size: clamp(0.9rem, 3vw, 1.2rem);
        }


        .removeBull-ctn h2,
        .addBull-ctn h2 {
            font-size: clamp(0.8rem, 5vw, 1.5rem);
            font-family: "Roboto Serif", serif;
            color: #C50808;
            padding-bottom: 10px;
        }

        .removeBull-ctn,
        .addBull-ctn {
            padding: 20px 80px;
        }

        .rounded-input{
            min-width: 337px;
            max-width: 500px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <div class="nav-container">
            <div class="img-box">
                <img src="../../images/Logo-Black.svg" alt="Logo" />
            </div>
        </div>
    </header>


    <h1>Welcome Mr. Ron!</h1>

    <!-- Remove Bull -->
    <section>
        <div class="removeBull-ctn">
            <h2>DELETE A BULL:</h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <!-- post back technique -->
            <form action="panel.php" method="post">
                <p>
                    <input class="check" id="check-1" type="checkbox" name="bullgone" value="bull-1">
                    <label for="check-1">Mr. Cherokee - K14</label>
                </p>
                <p>
                    <input class="check" id="check-2" type="checkbox" name="bullgone" value="bull-2">
                    <label for="check-2">Mr. Easy Mission</label>
                </p>
                <p>
                    <input class="check" id="check-3" type="checkbox" name="bullgone" value="bull-3">
                    <label for="check-3">Mr. Easy Select - K16</label>
                </p>
            </form>
        </div>

    </section>

    <!-- Add Bull -->
    <section>
        <div class="addBull-ctn">
            <h2 style="color: #17C508">ADD A BULL: </h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">

            <div class="form-wrapper">
            <!-- post back technique -->
            <form action="panel.php" method="post">
                <p style="padding-top: 20px;">
                    <label for="bullName">Bull Name:</label>
                </p>
                <p>
                    <input class="rounded-input" id="bullName" type="text" name="bullName" autofocus required>
                </p>

                <p style="padding-top: 20px;">
                    <label for="RAAA">RAAA#:</label>
                </p>
                <p>
                    <input class="rounded-input" id="RAAA" type="text" name="RAAA" required>
                </p>
                <p style="padding-top: 20px;">
                    <label for="dob">Date of Birth:</label>
                </p>
                <p>
                    <input class="rounded-input" id="dob" type="date" name="dob" required>
                </p>
                <p>
                    <input class="rounded-input submit-btn" type="submit" value="Submit" style="cursor: pointer">
                </p>

            </form>
            </div>
        </div>

    </section>


    <!-- PHP SECURITY -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //connect
        $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

        //sanitize values
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $_POST['password'];

        //PASSWORD HASH MATCHES USERNAME
        $sql = "SELECT username, passhash FROM user WHERE username='$username'";
        $result = $mysqli->query($sql);

        //Authenticate the user
        if ($result->num_rows == 0) {
            echo "Username could not be found";
        } else {
            $row = $result->fetch_assoc();

            //return bool
            if (password_verify($_POST['password'], $row['passhash'])) {

                //start and set session
                session_start();
                $_SESSION['username'] = $username;
                echo "Welcome, $row[username]!";

                //Redirects to the panel.php
                header("Location: panel.php");
            } else {
                echo "<p style='color: red;'>Incorrect username or password</p>";
            }
        }
    }

    ?>

</body>

</html>