<?php

/*
            CRUD Doc

Get Username Info               USER(usernameOrip, stat_type);
                                        Stat Types: 
                                                - username
                                                - ip
                                                - password
                                                - level
                                                - maxtime
                                                - admin
                                                - all [(one string between commas)]

Add User                        AddUser($user, $ip, $password, $level, $maxtime, $level);

Remove User                     RemoveUser($user);

Check if Signed In              isSignIn(usernameOrip);

Check If Premium                isPremium($usernameOrip);

Check If Admin                  isAdmin($usernameOrip);
*/

function USER($user, $stat) {

    $stat_types = array("username", "ip", "password", "level", "maxtime", "admin", "all");
    if(!in_array($stat, $stat_types)) {
        return "Error, Invalid stat type!";
    }

    $ddd = fopen("./db/users.db", "r"));
    $data = fgets($ddd);
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
    foreach($users as $g) {
        if(strpos($g, $user) !== false) {
            $found_check = true;
            $info = explode(",", $g);
            $db_user = $info[0];
            $db_ip = $info[1];
            $db_pass = $info[2];
            $db_level = $info[3];
            $db_maxtime = $info[4];
            $db_admin = int($info[5]) == 0 ? true:false;
            return;
        }
    }

    fclose($ddd);

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

?>