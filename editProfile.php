<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/profile.css" rel="stylesheet" type="text/css"/>
        <title>Edit Profile</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid big-container" style="padding: 0; top: 0; left: 0;">
            <div class="col-md-6 col-sm-12 profile-container" style="padding: 0;">
                <div class="col-md-8 col-md-offset-2">
                <form id="register-form" method="post" action="processRegisteration.php">
                    <div class="form-group">
                        <label for="exampleInputUsername" class="form-title">Your name</label>
                        <input type="text" class="form-control" name="exampleInputUsername" id="exampleInputUsername" placeholder=" Enter Name" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="form-title">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="exampleInputEmail" placeholder=" Enter Email id" value="">
                    </div>	
                    <div class="form-group">
                        <label for="password" class="form-title">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Not less than 8 characters, at least 1 integer,1 uppercase letter and 1 lower case" value="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-title">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label for="about-you" class="form-title">About You</label>
                        <textarea type="text" rows="8" class="form-control" id="about-you" name="about-you" placeholder="Enter something about yourself" value=""></textarea>
                    </div>
                    <div>
                        <center>
                            <button type="button" id="register_button" class="button submit" style="border: 1px solid #ffd11a;"><i class="fa fa-paper-plane" aria-hidden="true"></i>     Submit</button>
                        </center>
                    </div>
                    <br>
                    <div class="col-md-12 error-display" style="color: #ffd11a">

                    </div>
                    
                </form>
                </div>
            </div>
        </div>


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
