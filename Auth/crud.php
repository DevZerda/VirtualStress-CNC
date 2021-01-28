<?php

/*
                            CRUD Doc

Get Username Info               USER(usernameOrip, stat_type);                                      Return Value Function
                                        Stat Types:                    
                                                - username
                                                - ip
                                                - password
                                                - level
                                                - maxtime
                                                - admin
                                                - all [(one string between commas)]

Add User                        AddUser($user, $ip, $password, $level, $maxtime, $level);           Return Value Function

Remove User                     RemoveUser($user);                                                  Return Value Function

Check if Signed In              isSignIn(usernameOrip);                                             Return Boolen Function

Check If Premium                isPremium($usernameOrip);                                           Return Boolen Function

Check If Admin                  isAdmin($usernameOrip);                                             Return Boolen Function
*/
class CRUD 
{
    public function USER($user, $stat) {

        $stat_types = array("username", "ip", "password", "level", "maxtime", "admin", "all");
        if(!in_array($stat, $stat_types)) {
            return "Error, Invalid stat type!";
        }

        $data = file_get_contents("./db/users.db");
        $fix = str_replace("('", "", $data);
        $fix2 = str_replace("')", "", $fix);
        $db = str_replace("','", ",", $fix2);

        $found_check = false;
        $db_user = "";
        $db_ip = "";
        $db_pass = "";
        $db_level = "";
        $db_maxtime = "";
        $db_admin = false;

        $users = explode("\n", $db);
        foreach($users as $usr) {
            if (strlen($usr) > 4) {
                $info = explode(",", $usr);
                if($info[0] == $user || $info[1] == $user) {
                    $found_check = true;
                    $db_user = $info[0];
                    $db_ip = $info[1];
                    $db_pass = $info[2];
                    $db_level = $info[3];
                    $db_maxtime = $info[4];
                    $db_admin = $info[5];
                }
            }
        }

        if($found_check == false) {
            return "Error, No user fonud!";
        } else {
            switch($stat) {
                case $stat_types[0]:
                    return $db_user;
                    break;
                case $stat_types[1]:
                    return $db_ip;
                    break;
                case $stat_types[2]:
                    return $db_pass;
                    break;
                case $stat_types[3]:
                    return $db_level;
                    break;
                case $stat_types[4]:
                    return $db_maxtime;
                    break;
                case $stat_types[5]:
                    return $db_admin;
                    break;
                case $stat_types[6]:
                    return "$db_user,$db_ip,$db_pass,$db_level,$db_maxtime,$db_admin";
                    break;
            }
        }
    }

    public function AddUser($usr, $ip, $pw, $level, $maxtime, $admin) {
        $db = fopen("./db/users.db", "a");
        fwrite($db, "('$usr','$ip','$pw','$level','$maxtime','$admin')\n");
        fclose($db);
    }

    public function RemoveUser($usr) {
        
    }

    public function log_session($ip, $username) {
        $db = fopen("./db/current.db", "a");
        fwrite($db, "('$username','$ip')\n");
        fclose($db);
        /*
        $db = file_get_contents("./db/current.db");
        try {
            $users = json_decode($db);
        } catch(\Exception $e) {
            // log the error from: $e->what()
        }

        if(!in_array($username, $users["listed"])) {
            $users["listed"][$username] = $ip;
        }
        
        file_put_contents("./db/current.db", json_serialize($users)); */
    }

    public function remove_session($ip) {
        $old_db = file_get_contents("./db/current.db");
        $old_users = explode("\n", $old_db);
        $new_db = "";
        foreach($old_db as $skid) {
            if(!$skid.include($ip) && strlen($skid) > 5) {
                $new_db += $skid;
            }
        }

        $new_data = fopen("./db/users.db", "w");
        fwrite($new_data, $new_db);
        fclose($new_data);
        /*
        $old_db = file_get_contents("./db/current.db");
        try {
            $old_users = json_decode($old_db);
        } catch(\Exception $e) {
            // Handle error
        } // in ? or as? v lmao thats right v
        $found_user = null;
        foreach($old_db["listed"] as $user_name => $user_ip) {
            if($user_ip == $ip) $found_user = $user_name;
        }
        //wym like show here?
        if(!is_null($found_user)) {
            delete($old_db["listed"][$found_user]);
            file_put_contents("./db/current.db", json_serialize($old_db));
        } */
    }

    public function isSignedIn($usrOrip) {
        /*
        Read file for user chekcing 
        */

        $data = file_get_contents("./db/users.db");
        $fix = str_replace("('", "", $data);
        $fix2 = str_replace("')", "", $fix);
        $users = explode("\n", $fix2);
        foreach($users as $u) {
            if($u.include($usrOrip)) {
                return true;
            }
        }
    }

    public function Get_Current_Info($usrOrip) {
        $data = file_get_contents("./db/current.db");
        $users = explode("\n", $data);

        $found_check = false;
        $response = "";

        foreach($users as $u) {
            if($u.include($usrOrip)) {
                $found_check = true;
                $fix = str_replace("('", "", $u);
                $fix_2 = str_replace("')", "", $fix);
                $response = str_replace("','", ",", $fix_2);
                return;
            }
        }

        if($found_check == false) {
            return "Error, No user found!";
        } else {
            return $response;
        }
    }

    public function isPremium($usr) {
        $get_user = $this->USER($usr, "all")[3];
        if($get_user == "Error, No user fonud!") {
            return "Error, No user fonud!";
        } else {
            if(intval($status) == 0) {
                return false;
            } else if(intval($status) > 0 || intval($status) < 5) {
                return true;
            }
        }
    }

    public function isAdmin($usr) {
        $get_user = $this->USER($usr, "all")[5];
        if($get_user == "Error, No user found!") {
            return false;
        } else if(intval($get_user) == 0) {
            return false;
        } else if(intval($get_user) == 1) {
            return true;
        } else {
            return false;
        }
        
    }
}
?>