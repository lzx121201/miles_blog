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
        <title>Profile</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'navbar.php' ?>


        <div class="container-fluid big-container" style="padding: 0; top: 0; left: 0;">
            <div class="col-md-6 col-sm-12 profile-container" style="padding: 0;">
                <div class="col-md-6 col-md-offset-3" style="padding: 0; top: 10px;">
                    
                    <center><img class="img-responsive visible-lg profile-pic" src="img/team/1.jpg" alt="" style="height:250px;"/></center>
                    <center><img class="img-responsive visible-md profile-pic" src="img/team/1.jpg" alt="" style="height:250px;"/></center>
                    <center><img class="img-responsive visible-sm profile-pic" src="img/team/1.jpg" alt="" style="width: 50%;height:250px;"/></center>
                    <center><img class="img-responsive visible-xs profile-pic" src="img/team/1.jpg" alt="" style="width: 50%; height:180px;"/></center>
                    
                    <form action="" method="post" enctype="multipart/form-data" class="profile-form">
                        <center>
                            <input class="buttoncss" id="file" type="file" name="picture" />
                            <label class="buttoncss2" for="file">Choose File</label>
                            <input type='hidden' name="member_id" value=""/>
                            <button class="buttoncss" id="submit" type="submit" name="submit">Upload</button>
                        </center>
                    </form>
                </div>
                
                <div class="col-md-12" style="top: 20px;">
                    <center>
                        <h3 id="username">Jin &nbsp;&nbsp;<button type="button" class="glyphicon glyphicon-edit edit-btn"></button></h3>
                    </center>
                </div>
                
                <div class="col-md-12" style="color: #fff; top: 20px">
                    <h4>Your Posts</h4>
                    <ul class="your-post">
                        <li><a href="">post 1</a></li>
                        <li><a href="">post 2</a></li>
                        <li><a href="">post 3</a></li>
                        <li><a href="">post 4</a></li>
                        <li><a href="">post 5</a></li>
                        <li><a href="">post 6</a></li>
                        <li><a href="">post 7</a></li>
                    </ul>
                    <a href="" class="pull-right more">MORE &nbsp;&nbsp;<i class="glyphicon glyphicon-arrow-right"></i></a>
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
