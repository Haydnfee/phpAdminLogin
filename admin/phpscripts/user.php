<?php
    function createUser($fname, $username, $password, $email, $userlvl) {
        include('connect.php');
        $userString = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NOW(), '{$userlvl}', 'no', '2')";
        echo $userString;
        $userQuery = mysqli_query($link, $userString);
        if($userQuery) {

            // //random password gen
            // function randomPassword($length, $count, $characters){
            //     $character = array();

            //     //characters array
            //     $character["upperCase"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            //     $character["lowerCase"] = 'abcdefghijklmnopqrstuvwxyz';
            //     $character["numbers"] = '1234567890';
            //     $character["special_characters"] = '!@#%<>[]{}+_-=';
            // }

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

    function editUser($id, $fname, $username, $password, $email) {
        include('connect.php');
        $updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
            //echo $updatestring;

            $updatequery = mysqli_query($link, $updatestring);
            if($updatequery){
                redirect_to("admin_index.php");
            }else{
                $message = "there was an issue changing your user information.";
                return $message;
            }
            mysqli_close($link);
    }

    function deleteUser($id) {
        //echo $id;
        include('connect.php');
        $delstring = "DELETE FROM tbl_user WHERE user_id={$id}";
        $delquery = mysqli_query($link, $delstring);
        if($delquery) {
            redirect_to("../admin_index.php");
        }else{
            $message = "There was an issue with deleting this user.";
            return $message;
        }

        mysqli_close($link);
    }


?>
