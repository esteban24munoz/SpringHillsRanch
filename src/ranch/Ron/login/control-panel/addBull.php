<?php

session_start();

//CONNECT TO DATABASE
$mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

$bullName = "";
$raaa = "";
$dob = "";


$errorMsg = "";
$_SESSION['success'] = '';
$_SESSION['checkOut'] = '';
$_SESSION['cancel'] = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get submitted data and verify it wasn't left blank
    $bullName = trim(($_POST['bullName']));
    $raaa = trim(($_POST['raaa']));
    $dob = trim(($_POST['dob']));

    do{
        if (empty($bullName) || empty($raaa) ||
            $bullName == "" || $raaa == "") {
            $errorMsg = "Oops, Some fields are required.";
            break;
        }

        //sanitize data
        $bullName = htmlspecialchars($bullName);
        $raaa = htmlspecialchars($raaa);
        $dob = htmlspecialchars($dob);

        // To use functions that upload and resize images
        // require('image_util.php');

        #INSERT IMG INTO DATABASE
        // $upload_dir = 'control-panel/uploads';
        // $upload_url = "/~emunoz1/$upload_dir";

        // This is the directory the uploaded images will be placed in.
        // It must have priviledges sufficient for the web server to write to it
        // $upload_directory_full = "/home/emunoz1/public_html/springhillsranch/website/src/login/$upload_dir";
        // if (!is_writeable($upload_directory_full))
        // ShowError("The directory $upload_directory_full is not writeable.\n");
        // exit();
        // //GET IMG
        // $image_filename = "$upload_directory_full/$username.jpg";

        // Save the uploaded image to the given filename
        // $error_msg = UploadSingleImage($image_filename);
        // if ($error_msg != "")
        // ShowError($error_msg);
        // exit();

        // // Save uploaded image with a maximum width or height of 300 pixels
        // CreateThumbnailImage($image_filename, $image_filename, 300);

        // // Create a small thumbnail of the image to be used later
        // $image_thumbnail = $username . "_thumb.jpg";
        // CreateThumbnailImage($image_filename, "$upload_directory_full/$image_thumbnail", 60);


        $sql = "INSERT INTO bulls_db (bullName, raaa, dob)" . "VALUES ('$bullName', $raaa, '$dob')";
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
                ?>

                <form action="addBull.php" method="POST" enctype="multipart/form-data" id='add_form'>
                    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="5000000"> -->

                    <div class='row mb-3'>
                        <label class='col-sm-3 col-form-label'>Bull Name:</label>
                        <div class='col-sm-6'>
                            <input class='form-control' type='text' name='bullName' value="<?php echo $bullName; ?>" autofocus required>
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

                    <!-- SUBMIT & Cancel -->
                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href='panel.php' role="button">Cancel</a>
                        </div>
                    </div>

                </form>

                <!-- DISPLAY IMG -->

                <!-- #database connection file
                
                    // $mysqli = new mysqli ("localhost", "emunoz1", "H01761792", "emunoz1");
                    
                    // $sql = "SELECT image_name FROM springhillsranch";

                    // $result = $mysqli->query($sql);

                    // while($row = $result->fetch_assoc()){
                    //     echo "
                    //         <div class='main-upload'>
                    //             <img src='".$row['image_name']."'>
                    //         </div>
                    //     ";
                    // } -->
        </div>
    </section>

</body>

</html>