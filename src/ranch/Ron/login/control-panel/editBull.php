<?php

session_start();

//CONNECT TO DATABASE
$mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");


$id = "";
$bullName = "";
$raaa = "";
$dob = "";

$errorMsg = "";
$_SESSION['success'] = '';
$_SESSION['checkOut'] = '';
$_SESSION['cancel'] = true;


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if(!isset($_GET['id'])){
        header("location: panel.php");
        exit;
    }

    $id = $_GET['id'];

    //read row of the selected bull from db
    $sql = "SELECT * FROM bulls_db WHERE id=$id";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        // Error occurred while reading data
        header("location: panel.php");
        exit;
    }

    // read submitted data from db
    $bullName = $row['bullName'];
    $raaa = $row['raaa'];
    $dob = $row['dob'];

}
else{

    //POST method: update the data fo the client
    $id = $_POST['id'];
    //sanitize data
    $bullName = htmlspecialchars($_POST['bullName']);
    $raaa = htmlspecialchars($_POST['raaa']);
    $dob = htmlspecialchars($_POST['dob']);

    do{
        if (empty($id) || empty($bullName) || empty($raaa)) {
            $errorMsg = "Oops, Some fields are required.";
            break;
        }

        $sql = "UPDATE bulls_db " .
       "SET bullName = '$bullName', raaa = '$raaa', dob = '$dob' " . 
       "WHERE id = $id";
        $result = $mysqli->query($sql);

        if (!$result) {
            // Error occurred while inserting data
            $errorMsg = "Data is not Valid." . $mysqli->error;
            break;
        } 
       
        //BULL UPDATED!
        $_SESSION['success'] = "Bull Updated Successfully!";
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
            <h2>UPDATE BULL:</h2>
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

                <form action="editBull.php" method="POST" enctype="multipart/form-data" id='add_form'>
                    <input type="hidden" name='id' value="<?php echo $id; ?>">

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

                    <!-- SUCCESS MSG   -->
                    <?php
                    if (!empty($success)) {
                        echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$success</strong>
                                    <a href='/../../../../dynamic/cattle.php'>$checkOut</a>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>

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

        </div>
    </section>

</body>

</html>