<?php

/*
            CNC Info Doc

CNC Title           $CNC_Info["TITLE"];                                     Get : Set
Description         $CNC_Info["Description"];                               Get : Set
Version             $CNC_Info["Version"];                                   Get : Set
Creator             $CNC_Info["Creator"];                                   Get : Set
Owner               $CNC_Info["Onwer"][0] | $CNC_Info["Owner"][1];          Get : Set
Verification        $CNC_Info["Verification Code"];


           Current MSG Doc

Cmd                 $CurrentMSG["Cmd"];                                     Get : Set
Fullcmd             $CurrentMSG["Fullcmd"];                                 Get : Set
arg                 $CurrentMSG["arg"][int++];                              Get : Set

           Current User Doc

Username            $CurrentUser["Username"];                               Get : Set
IP                  $CurrentUser["IP"];                                     Get : Set
Password            $CurrentUser["Password"];                               Get : Set
Level               $CurrentUser["Level"];                                  Get : Set
Maxtime             $CurrentUser["Maxtime"];                                Get : Set
Admin               $CurrentUser["Admin"];                                  Get : Set

Set User Info       GetUserInfo($UserDBData);                               Function
*/

class STRING {
    public $CNC_Info = array(
        "Title" => "Virtual Stress CNC",
        "Description" => "Bypassing All Connection!",
        "Version" => "1.00",
        "Creator" => "Scrapy",
        "Owners" => array("Scrapy", "DirtyPorts"),
        "Verifcation Code" => ""
    );

    public $CurrentMSG = array(
        "Cmd" => "",
        "Fullcmd" => "",
        "arg" => array("", "")
    );

    public $CurrentUser = array( 
        "Username" => "",
        "IP" => "",
        "Password" => "",
        "Level" => "",
        "Maxtime" => "",
        "Admin" => false
    );

    public $Colors = array(
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
    );

    public function GetUserInfo($info) {
        $get_user = explode(",", $info);
        $this->CurrentUser["Username"] = $get_user[0];
        $this->CurrentUser["IP"] = $get_user[1];
        $this->CurrentUser["Password"] = $get_user[2];
        $this->CurrentUser["Level"] = $get_user[3];
        $this->CurrentUser["Maxtime"] = $get_user[4];
        $this->CurrentUser["Admin"] = $get_user[5];
    }
}
?>