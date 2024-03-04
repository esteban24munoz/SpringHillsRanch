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

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

        .removeBull-ctn p {
            padding: 20px;
            font-size: clamp(0.9rem, 3vw, 1.2rem);
        }

        .addBull-ctn p {
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

        .rounded-input {
            min-width: 337px;
            max-width: 500px;
        }

        .main-img{
            width: 300px;
        }
        .main-img img{
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <div class="nav-container">
            <div class="img-box">
                <img src="../../../images/Logo-Black.svg" alt="Logo" />
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
            <img src="../../../images/panel.svg" alt="bull-img" />

        </div>
        
        <!-- ADD BULL -->
        <section>
            <div class="addBull-ctn">
                <h2 style="color: #17C508">ADD A BULL: </h2>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
                <div class="form-wrapper">
                    
                    <!-- POST TO AddBull.php -->
                    <form action="addBull.php" method="POST" enctype="multipart/form-data" id='add_form'>
                        
                        <?php
                        echo "
                        <p style='padding-top: 20px;'>
                        <label for='bullName'>Bull Name:</label>
                        </p>
                        <p>
                        <input class='rounded-input' id='bullName' type='text' name='bullName' required>
                        </p>
                        
                        <p style='padding-top: 20px;'>
                        <label for='RAAA'>RAAA#:</label>
                        </p>
                        <p>
                        <input class='rounded-input' id='RAAA' type='text' name='RAAA' required>
                        </p>
                        <p style='padding-top: 20px;'>
                        <label for='dob'>Date of Birth:</label>
                        </p>
                        <p>
                        <input class='rounded-input' id='dob' type='date' name='dob' required>
                        </p>
                        <p>
                        
                        <p style='padding-top: 20px;'>
                        <label for='main-file'>Main Image:</label>
                        </p>

                        <p id='errorMs' style='color:red;'>
                        </p>
                        <p>
                        <input id='main-file' type='file'>
                        </p>

                        
                        <p style='padding-top: 20px;'>
                        <label for='file1'>Image #1:</label>
                        </p>

                        <p id='errorMs' style='color:red;'>
                        </p>
                        <p>
                        <input id='file1' type='file'>
                        </p>


                        <p style='padding-top: 20px;'>
                        <label for='file2'>Image #2:</label>
                        </p>

                        <p id='errorMs' style='color:red;'>
                        </p>
                        <p>
                        <input id='file2' type='file'>
                        </p>


                        <p style='padding-top: 20px;'>
                        <label for='file3'>Image #3:</label>
                        </p>

                        <p id='errorMs' style='color:red;'>
                        </p>
                        <p>
                        <input id='file3' type='file'>
                        </p>
                        
                        <p>
                        <input class='rounded-input submit-btn' type='submit' id='submit' value='Submit' style='cursor: pointer; margin-top: 20px;'>
                        </p>
                        ";
                        ?>
                    </form>


                    <!-- DISPLAY IMG -->
                    <?php

                    #database connection file
                
                    $mysqli = new mysqli ("localhost", "emunoz1", "H01761792", "emunoz1");
                    
                    $sql = "SELECT image_name FROM springhillsranch";

                    $result = $mysqli->query($sql);

                    while($row = $result->fetch_assoc()){
                        echo "
                            <div class='main-upload'>
                                <img src='".$row['image_name']."'>
                            </div>
                        ";
                    }

                    ?>
                    
                    <!-- JS Handle IMG ERROR-->
                    <script>
                        $(document).ready(function(){
                        // jQuery methods go here...
                            
                            $("#submit").click(function(e){
                                e.preventDefault();
                                
                                let form_data = new FormData();
                                let mainImg = $("#main-file")[0].files;

                                //check image selected of not
                                if(mainImg.length > 0){
                                    form_data.append('main_image', mainImg[0]);

                                        $.ajax({
                                            url: 'addBull.php',
                                            type: 'post',
                                            data: form_data,
                                            contentType: false,
                                            processData: false,
                                            success: function(res){
                                                const data = JSON.parse(res);
                                                if(data.error == 1){
                                                    $("#errorMs").text(data.em);                     
                                                }
                                            }
                                        });
                                }
                                else{
                                    $("#errorMs").text("Please select an image.");
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </section>

        <!-- REMOVE BULL -->
        <section>
            <div class="removeBull-ctn">
                <h2>DELETE A BULL:</h2>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                <!-- post back technique -->
                <form action="removeBull.php" method="post">

                    <?php

                    echo " 
                <p>
                    <input class='check' id='check-1' type='checkbox' name='bullgone' value='bull-1'>
                    <label for='check-1'>Mr. Cherokee - K14</label>
                </p>
                <p>
                    <input class='check' id='check-2' type='checkbox' name='bullgone' value='bull-2'>
                    <label for='check-2'>Mr. Easy Mission</label>
                </p>
                <p>
                    <input class='check' id='check-3' type='checkbox' name='bullgone' value='bull-3'>
                    <label for='check-3'>Mr. Easy Select - K16</label>
                </p>

                <p>
                <input class='rounded-input submit-btn' type='submit' id='submit' value='Submit' style='cursor: pointer'>
                </p>
                ";

                    ?>
                </form>
            </div>

        </section>

    </main>
</body>

</html>