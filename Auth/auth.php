<?php

class AUTH 
{
    public function login($usr, $pw, $db_usr, $db_pw) {
        if(empty($usr) || empty($pw)) {
            return "Error, Fill in the blank to continue\r\n";
        } else {
            if($usr == $db_usr && $pw == $db_pw) {
                return "Successfully logged in, Welcome $usr\r\n";
            } else {
                return "[x] Error, Username or password is incorrect!\r\n";
            }
        }
    }
}

?>