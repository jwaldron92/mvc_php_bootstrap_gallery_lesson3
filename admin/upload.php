
<?php
/**
 *
 * A list of errors that could happen to be shown as
 * @the_message
 *
 * move uploaded file to the directory '/uploads'
 */
 if (isset($_POST['submit'])) {


    //echo "<pre>";
    //
    //print_r($_FILES['file_upload']);

     $upload_errors = array(

         UPLOAD_ERR_OK => "There is no error",
         UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize",
         UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
         UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
         UPLOAD_ERR_NO_FILE => "No file was uploaded.",
         UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
         UPLOAD_ERR_NO_FILE => "Failed to write file to disk.",
         UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
     );


     $temp_name = $_FILES['file_upload']['tmp_name'];

     $the_file = $_FILES['file_upload']['name'];

     $directory = "uploads";

     if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {

         $the_message = "File uploaded successfully";

     } else {

         $the_error = $_FILES['file_upload']['error'];

         echo $the_message = $upload_errors[$the_error];

     }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Document</title>
</head>
<body>


    <form action="upload.php" enctype="multipart/form-data" method="post">
        <?php
        //check if there was an error and print out the error

        if(!empty($upload_errors)){
            echo $the_message;
        }
        ?>


        <input type="file" name="file_upload"><br>

        <input type="submit" name="submit">

    </form>


</body>
</html>