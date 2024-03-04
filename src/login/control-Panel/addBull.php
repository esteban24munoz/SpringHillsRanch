<?php

#INSERT IMG INTO DATABASE
# check if image sent
if(isset($_FILES['main_image'])){

    #database connection file
    include "db_conn.php";

    #getting img data and store them in variables
    $img_name = $_FILES['main_image']['name'];
    $img_size = $_FILES['main_image']['size'];
    $tmp_name = $_FILES['main_image']['tmp_name'];
    $error    = $_FILES['main_image']['error'];


    #if there is no error ocurred while uploading
    if($error === 0){
        if($img_size > 100000000){
                $em = 'sorry, your file is too large.';

            #response array
            $error = array('error' => 1, 'em'=> $em);

            echo json_encode($error);
            exit();
        }else{
                //initialize response array
                $response = array();

                #get img extension store in var
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                #convert the img ext into lower case and store its
                $img_ex_lc = strtolower($img_ex);

                #array that stores allowed img extensions
                $allowed_exs = array("jpg", "jpeg", "png");

                #check if img extension is present
                if(in_array($img_ex_lc, $allowed_exs)){
                    
                    #renaming the img with random string
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;

                    #insert img name into database
                    $sql = "INSERT INTO springhillsranch (image_name) 
                        VALUES ('$new_img_name')";

                    $result = mysqli_query($conn, $sql);

                    if($result){
                        move_uploaded_file($_FILES['main_image']['tmp_name'], $new_img_name);
                        // Set the success status and the new image name in the response
                        $response['error'] = 0;
                        $response['new_img_name'] = $new_img_name;
                    }else {
                        // If database insertion fails, set error status in the response
                        $response['error'] = 1;
                        $response['em'] = "Database insertion failed.";
                    }
                        
                }
                else {
                    // If the image extension is not allowed, set error status in the response
                    $response['error'] = 1;
                    $response['em'] = "Invalid image extension.";
                    exit();
                }
                    // Encode the response array to JSON format and send it
                    echo json_encode($response);    
            }
    }
    else{
            $em = 'unknown error occurred!';

            #response array
            $error = array('error' => 1, 'em'=> $em);

            echo json_encode($error);
            exit();
    }

}

?>
