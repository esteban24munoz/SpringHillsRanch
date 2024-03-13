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
    <link rel="icon" href="../../../../../images/Logo-Black.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,300;0,8..144,400;0,8..144,500;0,8..144,600;1,8..144,300;1,8..144,400;1,8..144,500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8f5cf0b518.js" crossorigin="anonymous" defer></script>
    <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- BOOTSTRAP  JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="panel.css">

    <style>
        .welcome {
            position: relative;
        }

        .welcome>*:not(img) {
            position: absolute;
            user-select: none;
        }

        .welcome img {
            width: 100%;
        }

        .welcome h1 {
            padding-bottom: 5px;
            font-size: clamp(1.5rem, 3vw, 3rem);
            font-family: "Roboto Serif", serif;
            color: var(--clr-light);
            text-shadow: rgb(0, 0, 0) 1px 0 5px;
        }

        .log-out {
            text-align: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .main-img {
            width: 300px;
        }

        .main-img img {
            width: 100%;
        }

        
        /* TABLE OVERRIDE    */
        .table>:not(caption)>*>* {
            padding: 1.5rem 0.5rem;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <div class="nav-container">
            <div class="img-box">
                <img src="../../../../../images/Logo-Black.svg" alt="Logo" />
            </div>
        </div>
    </header>

    <main>
        <!-- WELCOME/LOG OUT -->
        <div class="welcome">
            <div class="log-out">
                <h1>Welcome Mr. Ron!</h1>
                <a href="logout.php" style="color:black">Log out</a>
            </div>
            <img src="../../../../../images/panel.svg" alt="bull-img" />
        </div>


        <!-- BULLS LIST -->
        <section>
            <div class="container my-5">
                <h2>List of Bulls</h2>
                <a href="addBull.php" class="btn btn-success" role="button">New Bull</a>
                <br>

                <!-- SUCCESS MSG   -->
                <?php

        
                if (isset($_SESSION['success']) && $_SESSION['cancel'] != true) {
                    echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>{$_SESSION['success']}</strong>
                                <a href='../../../../dynamic/cattle.php' target='_blank'>{$_SESSION['checkOut']}</a>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>";
                    // Unset the success message to prevent it from being displayed again
                    unset($_SESSION['success']);
                    unset($_SESSION['cancel']);
                }
                ?>
                
                <table class="table pt-9">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>RAAA#</th>
                            <th>DOB</th>
                            <th>Created At</th>                            
                            <th style='color:red';>ACTION</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $connection = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

                        if($connection->connect_error){
                            die("Connection failed: " . $connection->connect_error);
                        }
                        
                        //read all row from database table
                        $sql = "SELECT * FROM bulls_db";
                        $result = $connection->query($sql);

                        if(!$result){
                            die("Invalid Query: " . $connection->connect_error);
                        }
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                            <td>$row[id]</td>
                            <td>$row[bullName]</td>
                            <td>$row[raaa]</td>
                            <td>$row[dob]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a href='editBull.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='removeBull.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>
                            ";
                        }

                        ?>

                    </tbody>
                </table>
            </div>


        </section>

    </main>
</body>

</html>