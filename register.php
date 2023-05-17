<?php
session_start();
if (isset($_POST['token']) && isset($_SESSION['token']) && !empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $email = $_POST["email"];
        
        //Validation for name
        if(preg_match('/^[a-zA-Z\s]+$/', $name) == false) {
            echo 'Only Letters and space are allowed';
        } elseif((strlen($name) < 3) || (strlen($name) > 10)) {
            echo 'Lenght of name must be between 3 to 10';
        } else {
            //echo 'Name : '.$name;
        }//End of if else
        
        //Validation for mobile no.
        if(preg_match('/^[0-9]{10}$/', $mobile) == false) {
            echo 'Only numbers of 10-digit is allowed';
        } else {
            //echo 'Mobile : '.$mobile;
        }//End of if else
        
        $file_name=$_FILES['docfile']['name'];
        $file_type=$_FILES['docfile']['type'];
        $file_size = $_FILES['docfile']['size']; //in bytes
        $file_tmp = $_FILES['docfile']['tmp_name'];
        $file_ext = strrchr($file_name, '.');

        if (is_executable($file_tmp)) {
            echo 'File is executable and will harm the application';
        } elseif ($file_size && (in_array($file_ext, array(".jpg",".jpeg",".gif",".png"))) == false) {
            echo 'Only jpg, jpeg, gif, png are allowed';
        } elseif($file_size > 1024*100) {
            echo 'File size must be under 100KB';
        } else {
            echo $file_name.' : '.$file_type.' : '.$file_ext;
            if (move_uploaded_file($file_tmp, 'uploads/' . $file_name)) {
                echo "<h1>File Upload Success</h1>";
            } else {
                echo "<h1>File Upload not successfull</h1>";
            }//End of if else
        }//End of if else

        //Unset token and destroy session
        unset($_SESSION['token']);
        session_destroy();
    } else {
        echo 'Unauthorized access : Token does not matched';
    }//End of if else
} else {
   echo 'Unauthorized access : Token does not exist';
}//End of if else
//For more regEx, please visit https://courses.cs.washington.edu/courses/cse190m/12sp/cheat-sheets/php-regex-cheat-sheet.pdf
