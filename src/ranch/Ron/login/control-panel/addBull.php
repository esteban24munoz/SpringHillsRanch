<?php

session_start();

//CONNECT TO DATABASE
$mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

$bullName = "";
$raaa = "";
$dob = "";


$errorMsg = "";
$errorImg = "";
$_SESSION['success'] = '';
$_SESSION['checkOut'] = '';
$_SESSION['cancel'] = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get submitted data and verify it wasn't left blank
    $bullName = trim(($_POST['bullName']));
    $raaa = trim(($_POST['raaa']));
    $dob = trim(($_POST['dob']));
    $username = trim($_SESSION['username']);

    do{
        if (empty($bullName) || empty($raaa) ||
            $bullName == "") {
            $errorMsg = "Oops, Some fields are required.";
            break;
        }

        //sanitize data
        $bullName = htmlspecialchars($bullName);
        $raaa = htmlspecialchars($raaa);
        $dob = htmlspecialchars($dob);

        // Upload and check error for image uploading
        require('image_util.php');

        if(!empty($errorImg)){
            break;
        }
        else{
            // print_r($imagesPath);
            //GET VALUES FROM ARRAY
            $arrayPaths = getValuesFromImagePath($imagesPath);
            if($arrayPaths !== null){
                list($main_path, $path1, $path2, $path3) = $arrayPaths;

                //INSERT VALUES INTO DB
                $sql = "INSERT INTO bulls_db (bullName, raaa, dob, main_img, img_1, img_2, img_3)" . "VALUES ('$bullName', $raaa, '$dob', '$main_path', '$path1', '$path2', '$path3')";
                $result = $mysqli->query($sql);

                if (!$result) {
                    // Error occurred while inserting data
                    $errorMsg = "Data is not Valid:" . $mysqli->connect_error;
                    break;
                } 

                $bullName = "";
                $raaa = "";
                $dob = "";

                //BULL ADDED!
                $_SESSION['success'] = "Bull Added Successfully!";
                $_SESSION['checkOut'] = "Check it out";
                $_SESSION['cancel'] = false;

                header("location: panel.php");
                exit;
            }
            else{
                $errorMsg = "Something went wrong uploading images";
                break;
            }

        }

    } while(false);

} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bull</title>
    <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- BOOTSTRAP  JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- STYLESHEET -->
    <link rel="stylesheet" href="panel.css">

</head>

<style>
    /* ADD BULL  */

    .add-section {
        padding: 20px 80px;
    }

    .container h2 {
        font-size: clamp(0.8rem, 5vw, 1.5rem);
        font-weight: bold;
        color: green;
        padding-bottom: 10px;
    }
</style>

<body>

    <header>
        <!-- Navbar -->
        <div class="nav-container">
            <div class="img-box">
                <img src="../../../../../images/Logo-Black.svg" alt="Logo" />
            </div>
        </div>
    </header>

    <!-- ADD BULL -->
    <section class="add-section">
        <div class="container my-5">
            <h2>ADD A BULL:</h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">


              <!-- ERROR MSG   -->
                <?php
                if (!empty($errorMsg)) {
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMsg</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
                else if(!empty($errorImg)){
                    echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorImg</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                }
                ?>

            
                <form action="addBull.php" method="POST" enctype="multipart/form-data" id='add_form'>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='bullName'>Bull Name:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' type='text' name='bullName' id="bullName" value="<?php echo $bullName; ?>" autofocus required>
                        </div>
                    </div>

                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='RAAA'>RAAA#:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='RAAA' type='number' name='raaa' value="<?php echo $raaa; ?>" required>
                        </div>
                    </div>

                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='dob'>Date of Birth:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='dob' type='date' name='dob' value="<?php echo $dob; ?>">
                        </div>
                    </div>

                    <!-- MAIN IMG   -->
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='mainImg'>Main Image:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='mainImg' type='file' name='mainImg' required>
                        </div>
                    </div>

                    <!-- IMG-1  -->
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='img1'>Image #1:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='img1' type='file' name='img1' required>
                        </div>
                    </div>

                    <!-- IMG-2   -->
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='img2'>Image #2 (Optional):</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='img2' type='file' name='img2'>
                        </div>
                    </div>

                    <!-- IMG-3   -->
                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label' for='img3'>Image #3 (Optional):</label>
                        <div class='col-sm-6'>
                            <input class='form-control' id='img3' type='file' name='img3'>
                        </div>
                    </div>

                    <!-- SUBMIT & Cancel -->
                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href='panel.php' role="button">Cancel</a>
                        </div>
                    </div>

                </form>
        </div>
    </section>

</body>

</html>