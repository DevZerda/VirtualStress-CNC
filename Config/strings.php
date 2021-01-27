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

function GetUserInfo($usernameOrip) {

}

?>