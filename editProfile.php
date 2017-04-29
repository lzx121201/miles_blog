<?php
require_once 'session_timeout.php';
        include_once 'session.php';
if ($L == FALSE) {
                header("location: index.php");
}else{

        include 'navbar.php';
        require_once ("Includes/database.php");
        require_once 'classes/Post.php';
        require_once 'classes/User.php';

        $query = "SELECT * FROM user WHERE UserID = :uid";
        $statement = $db->prepare($query);
        $statement->bindValue(':uid', $UID);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $result = $statement->fetch();
        $statement->closeCursor();
        
        
        if(empty($form_errors))
        {
            $uname = $result->getName();
            $pass = $_POST['password'];
            $pass1 = $_POST['confirm-password'];
            $desc = $result->getDescription();;
        }
?>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/editProfile_js.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid big-container" style="padding: 0; top: 0; left: 0;">
            <div class="col-md-6 col-sm-12 profile-container" style="padding: 0;">
                <div class="col-md-8 col-md-offset-2">
                    <form id="edit-form" method="post" action="editUserDetail.php">
                    <div class="form-group">
                        <label for="exampleInputUsername" class="form-title">Your name</label>
                        <input type="text" class="form-control" name="exampleInputUsername" id="exampleInputUsername" placeholder=" Enter Name" value="<?php echo $uname;?>">
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
                        <textarea type="text" rows="8" class="form-control" id="about-you" name="about-you" placeholder="Enter something about yourself" value=""><?php echo $desc; ?></textarea>
                    </div>
                    <div>
                        <input type='hidden' name="UID" id="UID" value="<?php echo $UID; ?>"/>
                        <input type="hidden" name="original-password" id="original-password" value="<?php echo $result->getPassword(); ?>">
                        <center>
                            <button type="button" id="edit_button" class="button submit" style="border: 1px solid #ffd11a;"><i class="fa fa-paper-plane" aria-hidden="true"></i>     Submit</button>
                        </center>
                    </div>
                    <br>
                    <div class="col-md-12 error-display" style="color: #ffd11a">
                        <?php
                                if(!empty($form_errors))
                                {
                                    echo "<ul>";
                                    foreach ($form_errors as $e)
                                    {
                                        echo "<li>$e</li>";
                                    }
                                    echo "</ul>";
                                }
                          ?>
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
<?php 
}
?>