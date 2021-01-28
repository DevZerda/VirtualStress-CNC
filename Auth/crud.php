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

    public function RemoveU($usr) {
        
    }

    public function log_session($ip, $username) {
        // Look into the CSV functions or read/write JSON. Much faster, more elegant.
        // Less cancerware ;)
        // Base ref for CSV: https://www.php.net/manual/de/function.fgetcsv.php
        // For json: json_encode/json_decode to encode and decode JSON
        // Keep this here. i'll check it out
        /*
        $db = fopen("./db/current.db", "a");
        fwrite($db, "('$username','$ip')\n");
        fclose($db);
        */
        $db = file_get_contents("./db/current.db");
        try {
            $users = json_decode($db);
        } catch(\Exception $e) {
            // log the error from: $e->what()
        }

        if(!in_array($username, $users["listed"])) {
            $users["listed"][$username] = $ip;
        }
        //NEVER THOUGHT OF USING THIS vv file_put_contents(). THIS ONLY APPENDS? no overwrite?
        // docs: https://www.php.net/manual/en/function.file-put-contents.php
        // you dutch ? lol
        file_put_contents("./db/current.db", json_serialize($users));
    }

    public function remove_session($ip) {
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
        }
    }

    public function isSignedIn($status) {
        //BRUH THIS IS WRONG. THIS SUPPOSE TO BE DOING SOMETHING ELSE LMAO
        // then go fix it? o.o yes // read file from current.db to see if user is in it (HERE AN USER LINE: [ '('Jeff','1.1.1.1')' ]
        // I'll just reimpl all three of that. Gimme a sec.
    }

    public function isPremium($usr) {
        $get_user = $this->USER($usr, "all")[3];
        if($get_user )
        if(intval($status) == 0) {
            return false;
        } else if(intval($status) > 0 || intval($status) < 5) {
            return true;
        }
    } // this my first source in OOP. wait its possible to use $this->USER();?
    //idk why im fetching info from USER() here in main file to send back to these functions LMAO

    public function isAdmin($status) {
        
    }
}
?>