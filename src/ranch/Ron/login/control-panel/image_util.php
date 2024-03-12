<?php 

if(isset($_POST['submit'])){

    //FILE VARIABLES
    $file = $_FILES['mainImg'];
    // print_r($file);
    $fileName = $_FILES['mainImg']['name'];
    $fileTmpName = $_FILES['mainImg']['tmp_name'];
    $fileSize = $_FILES['mainImg']['size'];
    $fileError = $_FILES['mainImg']['error'];
    $fileType = $_FILES['mainImg']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    // This is the directory the uploaded images will be placed in.
    // It must have priviledges sufficient for the web server to write to it
    $upload_dir = 'control-panel/uploads';
    $upload_directory_full = "/home/emunoz1/public_html/springhillsranch/website/src/ranch/Ron/login/$upload_dir";
    if (!is_writeable($upload_directory_full))
    echo "The directory $upload_directory_full is not writeable.\n";

    //if ext is inside the array
    if(in_array($fileActualExt, $allowed)){
        //if no more errors
        if($fileError === 0){
            //check size of File
            if($fileSize < 1000000){

                //random number in time format
                $fileNameId = uniqid('', true).".".$fileActualExt;

                //GET IMG
                $fileDestination = $upload_directory_full.'/'.$fileNameId;
                move_uploaded_file($fileTmpName, $fileDestination);
                // header('Location: panel.php?uploadsucess');
                print "<h2>Account Created</h2>\n" .
                "<p><img src='uploads/$fileNameId' style='float:left; margin: 0pt 10pt 10px 10px;'></p>";
            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file.";
        }
    }
    else{
        echo "File extention not allowed.";
    }

}

?>