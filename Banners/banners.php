<?php

class BANNERS
{

    public function user_banner() {

    }

    public function main_banner($red, $purple, $reset) {
        $help_banner = $red. "                                        ,        ,\r\n".
                        "                                       /(        )`\r\n".
                        "         ". $purple. "╦  ╦╦╦═╗╔╦╗╦ ╦╔═╗╦". $red. "            \ \___   / |\r\n".
                        "         ". $purple. "╚╗╔╝║╠╦╝ ║ ║ ║╠═╣║". $red. "              /- _  `-/  '\r\n".
                        "          ". $purple. "╚╝ ╩╩╚═ ╩ ╚═╝╩ ╩╩═╝". $red. "          (/\/ \ \   /\\\r\n".
                        "                                      / /   | `    \\\r\n".
                        "                                      O O   ) /    |\r\n".
                        "                                      `-^--'`<     '\r\n".
                        "                          TM         (_.)  _  )   /\r\n".
                        "       |  | |\  | ~|~ \ /             `.___/`    /\r\n".
                        "       |  | | \ |  |   X                `-----' /\r\n".
                        "       `__| |  \| _|_ / \  <----.     __ / __   \\\r\n".
                        "                           <----|====O)))==) \) /====\r\n".
                        "                           <----'    `--' `.__,' \\\r\n".
                        "                                        |        |\r\n".
                        "                                         \       /\r\n".
                        "                                    ______( (_  / \______\r\n".
                        "                                  ,'  ,-----'   |        \\\r\n".
                        "                                  `--{__________)        \/\r\n". $reset;
        return $help_banner;
    }
}
?>