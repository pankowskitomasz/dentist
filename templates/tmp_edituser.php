<?php

//initial config
DatabaseConnect();
$usr = new TUser($GLOBALS['connection']);
$uid="";
$uname = "";
$upass = "";
$umail = "";

//handle page related actions
if(isset($_POST["edituser"])){
    $usr->getById(htmlspecialchars($_POST["edituser"]));
    $uid = $usr->getData("id");
    $uname = $usr->getData("username");
    $upass = $usr->getData("password");
    $umail = $usr->getData("email");
}
else if(isset($_POST["saveuser"])
&& isset($_POST["usrname"])
&& isset($_POST["usrpass"])
&& isset($_POST["usremail"])
&& !empty($_POST["usrname"])
&& !empty($_POST["usrpass"])
&& !empty($_POST["usremail"])){
    if(isset($_POST["usrid"])){
        $usr->setData("id",htmlspecialchars($_POST["usrid"]));
    }
    $usr->setData("username",htmlspecialchars($_POST["usrname"]));
    $usr->setData("password",sha1(htmlspecialchars($_POST["usrpass"])));        
    $usr->setData("email",htmlspecialchars($_POST["usremail"]));    
    $usr->saveUser();
}

?>

<section class="user-s2 container-fluid d-flex align-items-start justify-content-center py-5 minh-70vh">
    <form action=""
        autocomplete="off"
        class="form-user w-100"
        method="post">
        <div class="row minh-70vh">
            <div class="col-12 col-sm-4 col-md-3 mb-3">
                <div class="list-group">
                    <input class="list-group-item list-group-item-action"
                        name="dashboard"
                        type="submit"
                        value="Dashboard">  
                    <input class="list-group-item list-group-item-action"
                        name="messages"
                        type="submit"
                        value="Messages">     
                    <?php 
                        if(isset($_SESSION["UserLogged"])
                        && $_SESSION["UserLogged"]==="administrator"){
                    ?>                      
                    <input class="list-group-item list-group-item-action"
                        name="users"
                        type="submit"
                        value="Users">          
                    <?php } ?>                 
                    <input class="list-group-item list-group-item-action"
                        name="logout"
                        type="submit"                                
                        value="Logout">
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card w-100 mb-3">
                    <div class="card-header">
                        <small class="text-muted">Add / modify user</small>
                    </div>
                    <div class="card-body px-4" id="userdatapanel">
                        <input type="hidden" 
                            name="usrid" 
                            value="<?php echo $uid; ?>">
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">User name:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <input class="form-control text-center"
                                    name="usrname"
                                    type="text"
                                    tabindex="1"
                                    value="<?php echo $uname; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">Password:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <input class="form-control text-center"
                                    name="usrpass"
                                    type="password"
                                    tabindex="2"
                                    value="<?php echo $upass; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12 col-sm-4 col-md-3 col-lg-2 col-form-label">Email:</label>
                            <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                                <input class="form-control text-center"
                                    name="usremail"
                                    type="email"
                                    tabindex="3"
                                    value="<?php echo $umail; ?>">
                            </div>
                        </div>
                        <div class="my-2 border-bottom border-secondary pb-3">
                            <small class="text-muted">
                                *Fields cannot be empty, otherwise changes will not be saved
                            </small>
                        </div>
                        <button class="btn btn-outline-dark float-left"
                            name="users"
                            tabindex="7"
                            type="submit">
                            Back
                        </button>
                        <button class="btn btn-outline-dark float-right"
                            name="saveuser"
                            tabindex="5"
                            type="submit">
                            Save
                        </button>
                        <button class="btn btn-outline-dark float-right mx-3"
                            name="clearform"
                            tabindex="6"
                            type="clear">
                            Clear
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>    
<section class="contact-s1 container-fluid d-flex bg-info minh-30vh p-0 shadow">
    <div class="row mx-0 w-100">
        <div class="col-md-6 d-none d-md-block minh-30vh contact-sub-s1">
        </div>
        <div class="col-12 col-md-6 py-5 d-flex align-items-center justify-content-center">
            <div class="text-white text-center">
                <h4 class="font-weight-bold mb-5">Contact us</h4>
                <ul class="list-unstyled mx-5">
                    <li>
                        <span class="fa fa-map-signs"></span>
                        Address
                    </li>
                    <li class="mb-3 ml-3 small">
                        Charleston, Williams Street 12, LZ
                    </li>
                    <li>
                        <span class="fa fa-phone-square"></span>
                        Phone Registration
                    </li>
                    <li class="mb-3 ml-3 small">
                        +(01) 879 345 123
                    </li>
                    <li>
                        <span class="fa fa-envelope-square"></span>
                        Email Registration
                    </li>
                    <li class="mb-3 ml-3 small">
                        registration&#64;dentist.dt
                    </li>
                    <li>
                        <span class="fa fa-ambulance"></span>
                        Emergency contact (phone)
                    </li>
                    <li class="mb-3 ml-3 small">
                        +(01) 849 315 443
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>