<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();   
}

include_once "php/comm.php";
include_once "php/db.php";
include_once "php/t_message.php";
include_once "php/t_user.php";

//to remove after pub
//include_once "php/support.php";
//createAdminAccount("password","admin@mussodent.com","9731");

if(isset($_POST["username"])
&& isset($_POST["userpass"])){
    DatabaseConnect();
    $usr = new TUser($GLOBALS['connection']);   
    $usr->getByName(htmlspecialchars($_POST["username"]));
    if($usr->getData("username")===htmlspecialchars($_POST['username'])
    && $usr->getData("password")===sha1(htmlspecialchars($_POST['userpass']))
    ){
        $_SESSION["UserLogged"] = $usr->getData("username");
    }
}

if(isset($_SESSION["UserLogged"])){
    //reading view config
    if(isset($_POST["login"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["dashboard"])){
        $_SESSION["view"] = "dashboard";
    }
    if(isset($_POST["messages"])){
        $_SESSION["view"] = "messages";
    }
    if(isset($_POST["users"])){
        $_SESSION["view"] = "users";
    }
    if(isset($_POST["edituser"])){
        $_SESSION["view"] = "edituser";
    }
    if(isset($_POST["msginfo"])){
        $_SESSION["view"] = "msginfo";
    }
    if(isset($_POST["msgsearch"])){
        $_SESSION["view"] = "msgsearch";
    }
    if(isset($_POST["logout"])){
        $_SESSION["view"] = "logout";
    }
    
    //template selection and config
    if(isset($_SESSION["view"])){
        switch($_SESSION["view"]){
            case "messages":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "users":
                $_SESSION["viewTemplate"] = "templates/tmp_users.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "dashboard":
                $_SESSION["viewTemplate"] = "templates/tmp_dashboard.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msginfo":
                $_SESSION["viewTemplate"] = "templates/tmp_message_info.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "msgsearch":
                $_SESSION["viewTemplate"] = "templates/tmp_messages.php";
                $_SESSION["CurrentPage"]=1;
                break;
            case "edituser":
                $_SESSION["viewTemplate"] = "templates/tmp_edituser.php";
                break;
            default: 
                $_SESSION["viewTemplate"] = "templates/tmp_login.php";     
                $_SESSION = array();
                session_destroy(); 
        }
    }
}
else{
    $_SESSION["viewTemplate"] = "templates/tmp_login.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">
    <title>Dentist | We create beautiful smiles</title>
</head>
<body>
    <header class="container-fluid px-0">
        <div class="row py-2 bg-info mx-0 px-4">
            <p class="text-white small mb-0 mt-1 d-none d-sm-inline">
                Open Monday - Friday from 8:00am - 6:00pm
            </p>
            <ul class="list-inline ml-auto mb-0">
                <li class="list-inline-item">
                    <a href="https://www.facebook.com"
                        class="text-white h5 mx-2"
                        rel="noopener noreferer">
                        <span class="fa fa-facebook"></span>
                    </a>                        
                </li>
                <li class="list-inline-item">
                    <a href="https://www.twitter.com"
                        class="text-white h5 mx-2"
                        rel="noopener noreferer">
                        <span class="fa fa-twitter"></span>
                    </a>                        
                </li>
            </ul>
        </div>
        <nav class="navbar navbar-expand-md nabvar-dark bg-secondary text-shadow">
            <a href="index.html" class="navbar-brand pt-0">
                <img src="img/navbar_logo.png" class="d-inline-block" alt="logo"/>
                <span class="navbar-text font-logo text-white">
                    Dentist
                </span>
            </a>
            <button class="navbar-toggler" data-toggle="collapse"
                data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ml-auto initialism font-weight-bold font-menu">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="patient.html" class="nav-link">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a href="appointment.html" class="nav-link">Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">
                            <span class="fa fa-user"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if(isset($_SESSION["viewTemplate"])){
            include $_SESSION["viewTemplate"]; 
        }
        else{
            include "templates/tmp_login.php";                            
        }
        ?>
    </main>    
    <footer class="container-fluid bg-secondary text-center text-white p-3">
        <small class="my-0">
            Copyright &copy; 2020-2021 Tomasz Pankowski. All rights reserved.
            <a class="text-white" href="privacy.html">Privacy policy</a>
        </small>
    </footer>
    <div class="modal" id="privacyModal">
        <div class="modal-dialog h-100 d-flex align-items-center">
            <div class="modal-content border-green p-2">
                <div class="modal-header text-center">
                    <h4 class="font-header text-secondary font-weight-bold">GPDR Declaration</h4>
                    <button 
                        data-target="#privacyModal"
                        data-dismiss="modal"
                        class="close text-secondary">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <p class="initialism">
                        This website is a <span class="text-danger"> demo version </span> of real website,  It doesn't collect and process,
                        in long term meaning (longer than needed for website operation during visitor's
                        presence), any user (visitor) data.
                    </p>
                    <p class="initialism pt-2">
                        All information collected during visitor's 
                        presence on this website is used only for technical purposes, required for 
                        correct operation of website or demonstration purposes related to technical 
                        mechanisms and presentation of its operation... 
                        <a href="privacy.html" class="text-secondary font-weight-bold">More about privacy</a>
                    </p>                        
                    <p class="initialism pt-2">
                        If you accept privacy policy please click button "accept". If you 
                        refuse it, leave page by closing it in your web browser, please.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-dark mx-auto"
                        onclick="acceptPrivacyPolicy()">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>  
    <script src="js/main.min.js"></script>
    </body>
</html>