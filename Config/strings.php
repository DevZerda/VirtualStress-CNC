<?php

/*
            CNC Info Doc

CNC Title           $CNC_Info["TITLE"];
Description         $CNC_Info["Description"];
Version             $CNC_Info["Version"];
Creator             $CNC_Info["Creator"];
Owner               $CNC_Info["Onwer"][0] | $CNC_Info["Owner"][1];
Verification        $CNC_Info["Verification Code"];


           Current MSG Doc

Cmd                 $CurrentMSG["Cmd"];
Fullcmd             $CurrentMSG["Fullcmd"];
arg                 $CurrentMSG["arg"][int++];

           Current User Doc

Username            $CurrentUser["Username"];
IP                  $CurrentUser["IP"];
Password            $CurrentUser["Password"];
Level               $CurrentUser["Level"];
Maxtime             $CurrentUser["Maxtime"];
Admin               $CurrentUser["Admin"];
*/

$CNC_Info = array(
    "Title" => "Virtual Stress CNC",
    "Description" => "Bypassing All Connection!",
    "Version" => "1.00",
    "Creator" => "Scrapy",
    "Owners" => array("Scrapy", "DirtyPorts"),
    "Verifcation Code" => ""
);

$CurrentMSG = array(
    "Cmd" => "",
    "Fullcmd" => "",
    "arg" => array("", "")
);

$CurrentUser = array( 
    "Username" => "",
    "IP" => "",
    "Password" => "",
    "Level" => "",
    "Maxtime" => "",
    "Admin" => false
);

$Colors = array(
    "Red" => "",
    "Yellow" => "\x1b[33m",
    "Blue" => "\x1b[34m",
    "Purple" => "\x1b[95m",
    "Green" => "\x1b[32m",
    "Cyan" => "\x1b[96m",
    "Black" => "\x1b[30m",
    "Grey" => "\x1b[90m",
    "Reset" => "\x1b[39m",
    "Background_Red" => "\x1b[41m",
    "Background_Green" => "\x1b[42m",
    "Background_Grey" => "\x1b[100m",
    "Background_Reset" => "\x1b[49m",
    "Clear" => "\033[2J\033[1;1H"
)

function GetUserInfo($info) {
    $get_user = explode(",", $info);
    $CurrentUser["Username"] = $info[0];
    $CurrentUser["IP"] = $info[1];
    $CurrentUser["Password"] = $info[2];
    $CurrentUser["Level"] = $info[3];
    $CurrentUser["Maxtime"] = $info[4];
    $CurrentUser["Admin"] = $info[5];
}

?>