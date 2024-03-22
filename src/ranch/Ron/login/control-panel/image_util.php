<?php 
$errorImg = "";

if(isset($_POST['submit'])){

    //GET IMG NAMES, ASSOCIATIVE ARRAY
    $file = array(
        'mainImg' => $_FILES['mainImg'],
        'img1' => $_FILES['img1'],
        'img2' => $_FILES['img2'],
        'img3' => $_FILES['img3'],
    );

    // print_r($file);

    foreach($file as $key => $value){
        $fileName = $_FILES[$key]['name'];
        $fileTmpName = $_FILES[$key]['tmp_name'];
        $fileSize = $_FILES[$key]['size'];
        $fileError = $_FILES[$key]['error'];
        $fileType = $_FILES[$key]['type'];
 
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        // This is the directory the uploaded images will be placed in.
        // It must have priviledges sufficient for the web server to write to it
        $upload_dir = 'uploads';
        $upload_directory_full = "/home/emunoz1/public_html/springhillsranch/website/src/dynamic/$upload_dir";
        if (!is_writeable($upload_directory_full))
        echo "The directory $upload_directory_full is not writeable.\n";

        //if ext is inside the array
        if(in_array($fileActualExt, $allowed)){
            //if no more errors
            if($fileError === 0){
                //check size of File
                if($fileSize < 10000000){

                    //random number in time format
                    $fileNameId = uniqid('', true).".".$fileActualExt;

                    //GET IMG
                    $fileDestination = $upload_directory_full.'/'.$fileNameId;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $imagesPath[] = $upload_dir. '/'. $fileNameId;

                }
                else{
                    $errorImg = "Your file is too big!";
                }
            }
            else{
                $errorImg =  "There was an error uploading your file.";
            }
        }
        else{
            $errorImg = "File extension not allowed.";
        }
    }

}

//GETTER FUNCTION

function getValuesFromImagePath($imagesPath){

    //check if it is not empty
    if(!empty($imagesPath)){

        //assign each value of imagesPath to individual variables.
        list($main_path, $path1, $path2, $path3) = $imagesPath;
        //RETURN VARIABLES
        return array($main_path, $path1, $path2, $path3);
    }
    else{
        return null;
    }
}

?>