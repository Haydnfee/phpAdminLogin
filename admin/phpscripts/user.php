<?php
    function createUser($fname, $username, $password, $email, $userlvl) {
        include('connect.php');
        $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NOW(), '{$userlvl}', 'no')";
        echo $userString;
        $userQuery = mysqli_query($link, $userString);
        if($userQuery) {

            //random pass gen
            function randomPassword($length, $count, $characters){
                $character = array();

                //characters array
                $character["upperCase"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $character["lowerCase"] = 'abcdefghijklmnopqrstuvwxyz';
                $character["numbers"] = '1234567890';
                $character["special_characters"] = '!@#%<>[]{}+_-=';
            }

            //Gets current email being stored then uses mail() to send email including username and password.
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
