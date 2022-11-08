<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta property="og:title" content="Dentist">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="en_US">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">
    <title>Dentist | Message sent</title>
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
    <section class="container confirm-s1 d-flex py-3 align-items-center minh-70vh">
        <div class="my-auto w-100">
            <div class="row w-100">
                <div class="col-xs-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3 text-center">
                    <h3 class="text-center font-header text-secondary mb-3">Message sent!</h3>
                    <table class="table table-hover border text-left font-menu bg-light opacity-8">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="2" class="font-header">Summary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Full name</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fname']))
                                        echo htmlspecialchars($_POST['fname']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fphone']))
                                        echo htmlspecialchars($_POST['fphone']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fmail']))
                                        echo htmlspecialchars($_POST['fmail']);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>
                                    <?php 
                                    if(isset($_POST['fmsg']))
                                        echo htmlspecialchars($_POST['fmsg']);
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="appointment.html" 
                        class="btn btn-outline-secondary font-header mt-3">OK</a>
                </div>
            </div>
        </div>
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