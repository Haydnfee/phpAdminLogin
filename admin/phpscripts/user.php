<?php
    function createUser($fname, $username, $password, $email, $userlvl) {
        include('connect.php');
        $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NOW(), '{$userlvl}', 'no')";
        echo $userString;
        $userQuery = mysqli_query($link, $userString);
        if($userQuery) {

            //Gets current email being stored then uses mail() to send email including username and password. Does not send
            $to = $email; 
            $subject = 'Your username and password confirmation';
            $header = "username: '$username.' '\n' password: '$password'";
            mail($to, $subject, $header);
        
            redirect_to("admin_index.php");
        }else{
            $message = "There was a problem in the creation process.";
            return $message;
        }

        mysqli_close($link);
    }


?>
