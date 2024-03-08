<?php

if(isset($_GET['id'])){ 

    $id = $_GET['id'];

    //connect to Database
    $mysqli = new mysqli("localhost", "emunoz1", "H01761792", "emunoz1");

    //remove bull from db
    $sql = "DELETE FROM bulls_db WHERE id = $id";
    $result = $mysqli->query($sql);

    if (!$result) {
        // Error occurred while inserting data
        $errorMsg = "Error deleting bull." . $mysqli->error;
    } 
    else{
        //BULL Deleted!
        $success = "Bull Deleted Successfully!";
        $checkOut = "Check it out";
    }

}

header("location: panel.php");
exit;

?>