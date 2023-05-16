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
        
        /*echo $_SESSION['token'].' === '.$_POST['token'];
        echo 'Token matched';
        unset($_SESSION['token']);
        session_destroy();*/
    } else {
        echo 'Unauthorized access : Token does not matched';
    }//End of if else
} else {
   echo 'Unauthorized access : Token does not exist';
}//End of if else
//For more regEx, please visit https://courses.cs.washington.edu/courses/cse190m/12sp/cheat-sheets/php-regex-cheat-sheet.pdf
