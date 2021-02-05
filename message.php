<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_message.php";

//initial config
DatabaseConnect();
$message = new TMessage($GLOBALS['connection']);
if(!isset($_SESSION["MessageCounter"])){
    $_SESSION["MessageCounter"]=0;
}
if(!isset($_SESSION["lastMessage"])){
    $_SESSION["lastMessage"]=array(
        "firstname"=>"",
        "phone"=>"",
        "email"=>"",
        "message"=>""
    );
}

if($_SESSION["MessageCounter"]<=MSG_LIMIT
&& isset($_POST["fname"])
&& isset($_POST["fphone"])
&& isset($_POST["fmail"])
&& isset($_POST["fmsg"])){
    //below execution limit
    if($_SESSION["lastMessage"]["firstname"]!==htmlspecialchars($_POST["fname"])
    && $_SESSION["lastMessage"]["phone"]!==htmlspecialchars($_POST["fphone"])
    && $_SESSION["lastMessage"]["email"]!==htmlspecialchars($_POST["fmail"])
    && $_SESSION["lastMessage"]["message"]!==htmlspecialchars($_POST["fmsg"])){
    if($message->insert(htmlspecialchars($_POST["fname"]),
        "",
        htmlspecialchars($_POST["fphone"]),
        htmlspecialchars($_POST["fmail"]),
        htmlspecialchars($_POST["fmsg"]))){
            include "confirm.php";
        }
        else{
            //message already exists
            $_SESSION["errorMessage"] = "Your message was already registered";
            include "error.php";
            
        }
    }
    else{
        //message already exists
        $_SESSION["errorMessage"] = "Your message was already registered";
        include "error.php";
    }
}
else{
    //when execution limit exceeded
    $_SESSION["errorMessage"] = "Message limit exceeded";
    include "error.php";
}

?>