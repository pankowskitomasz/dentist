<?php 

include_once("comm.php");

function DatabaseConnect(){
    if($GLOBALS['flag_connected']===false){
        try{
            $GLOBALS['connection'] = new PDO("mysql:host=".HOST.";dbname=".DATABASE.";",USER,PASSWORD);
            $GLOBALS['connection']->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $GLOBALS['connection']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $GLOBALS['flag_connected'] = true;
        }   
        catch(PDOException $e){
            $GLOBALS['flag_connected'] = false;
        }
    }
}

function DatabaseDisconnect(){
    $GLOBALS['connection'] = null;
    $GLOBALS['flag_connected'] = false;
}


?>
