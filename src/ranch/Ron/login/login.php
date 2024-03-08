<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../../../images/Logo-Black.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <!-- Navbar -->
        <div class="nav-container">
          <div class="img-box">
            <img src="../../../../images/Logo-Black.svg" alt="Logo"/>
          </div>
        </div>
    </header>

    <!-- Login -->
    <section>
        <div class="login-container">
		
		<?php

    //show form
		?>
		
            <!-- post back technique -->
            <form method="POST" action="login.php">
            <p>
                <label for="user">Username:</label>
                <input class="rounded-input" id="user" type="text" name="username" autofocus required>
            </p>
            <p>
                <label for="pass">Password:</label>
                <input class="rounded-input" id="pass" type="password" name="password" size="10" required>
            </p>
            <p>
                <input class="rounded-input submit-btn" type="submit" value="Login" style="cursor: pointer">
            </p>
               
            </form>
        </div>

    </section>
  

    <!-- PHP SECURITY -->
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    //connect
    $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

    //sanitize values
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    

    //TODO: Get the pass hash from the user table database
    //that matches the username
    $sql = "SELECT username, passhash FROM user WHERE username='$username'";
    $result = $mysqli->query($sql);

    //Authenticate the user
    if ($result->num_rows == 0) {
        echo "
        <div style='display: flex; justify-content: center;'>
			<p style='color: red;'>
			Username could not be found
			</p>
			</div>
            ";
    }

    else{ 
        $row = $result->fetch_assoc();

        //functions returns a bool
        if(password_verify($_POST['password'], $row['passhash'])){     

            session_start();
            //set session variable
            $_SESSION['username'] = $username;
            echo "Welcome, $row[username]!";
            
            //specify an HTTP header to redirects the user to index.php
            header("Location: ./control-panel/panel.php");
        }
        else{
            echo "
			<div style='display: flex; justify-content: center;'>
			<p style='color: red;'>
			Incorrect password or username
			</p>
			</div>";
        }
    }
}

    ?>
    
</body>
</html>