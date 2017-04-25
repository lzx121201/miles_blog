<?php
if (empty($form_errors) || !isset($form_errors)) {
    $username = "";
    $email = "";
    $password1 = "";
    $password2 = "";
    $gender = "";
}
if(empty($form_errors1) || !isset($form_errors1))
{
        $user = "";
        $pass = "";
    
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Agency - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/register_js.js" type="text/javascript"></script>
        <script src="js/login_js.js" type="text/javascript"></script>
        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->

    </head>

    <body id="page-top" class="index">
        <ul class="cb-slideshow">
            <li><span class="a">Image 01</span></li>
            <li><span class="b">Image 02</span></li>
            <li><span class="a">Image 03</span></li>
            <li><span class="b">Image 04</span></li>
            <li><span class="a">Image 05</span></li>
            <li><span class="b">Image 06</span></li>
        </ul>
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#service">Login</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#portfolio">Register</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">Team</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header id="top" class="header">
            <div class="text-vertical-center">
                <center><h1 class="quote">Miles</h1></center>
                <h3 class="quote">Share Every Mile You've Go</h3>
                <a href="home.php" class="btn btn-dark btn-lg" id="start">Discover</a>
            </div>
        </header>
        <hr>

        <!-- Services Section -->
        <section id="service">
            <div class="section-content">
                <h1 class="section-header">Login</h1>
            </div>
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <form id="login-form" method="post" action="processLogin.php">
                        <input type="email" name="user" id="user" placeholder="Email" value="<?php echo $user; ?>">
                        <input type="password" name="pass" id="pass" placeholder="Password" value="<?php echo $pass; ?>">
                        <center>
                            <input type="button" name="login" id="login_button" class="login loginmodal-submit" value="Login">
                        </center>
                    </form>
                    <div class="col-md-12 error-display">

                    </div>
                </div>
                <br>

            </div>
        </section>

        <!-- Portfolio Grid Section -->
        <section id="portfolio" class="bg-light-gray">
            <div class="section-content">
                <h1 class="section-header">Register</h1>
            </div>
            <div class="contact-section">
                <div class="container">
                    <form id="register-form" method="post" action="processRegisteration.php">
                        <div class="container">
                            <div class="form-group">
                                <label for="exampleInputUsername" class="form-title">Your name</label>
                                <input type="text" class="form-control" name="exampleInputUsername" id="exampleInputUsername" placeholder=" Enter Name" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail" class="form-title">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" placeholder=" Enter Email id" value="<?php echo $email; ?>">
                            </div>	
                            <div class="form-group">
                                <label for="password" class="form-title">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Not less than 8 characters, at least 1 integer,1 uppercase letter and 1 lower case" value="<?php echo $password1; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-title">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="" value="<?php echo $password2; ?>">
                            </div>
                            <div class="form-group">
                                <label for ="gender" class="form-title">Gender</label>
                                <select class="form-control" id="gender" name="gender"  value="<?php echo $gender; ?>">
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                            </div>
                            <div>
                                <center>
                                    <button type="button" id="register_button" class="button submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>     Submit</button>
                                </center>
                            </div>
                            <br>
                            <div class="col-md-12 error-display">
                                hi
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="bg-light-gray">
            <div class="container">
                <div class="row">
                    <div class="section-content">
                        <h1 class="section-header">Our Amazing Team</h1>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="team-member">
                            <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                            <h4 style="color: white; text-shadow:5px 2px 10px #2c3e50">Jin</h4>
                            <p class="text-muted" style="color: white; text-shadow:5px 2px 10px #2c3e50">Fron-end Designer</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="team-member">
                            <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                            <h4 style="color: white; text-shadow:5px 2px 10px #2c3e50">Kyle</h4>
                            <p class="text-muted" style="color: white; text-shadow:5px 2px 10px #2c3e50">Back-end Coder</p>
                            <ul class="list-inline social-buttons">
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>

    </body>

</html>
