<?php
        require_once 'session_timeout.php';
        include_once 'session.php';
if ($L == FALSE) {
                header("location: index.php");
}else{

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
        <title>Profile</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include 'navbar.php';
        require_once ("Includes/database.php");
        require_once 'classes/Post.php';

        require_once 'classes/User.php';

        
            if (!empty($form_errors1)) {
                
            }
        

        $query = "SELECT * FROM user WHERE UserID = :uid";
        $statement = $db->prepare($query);
        $statement->bindValue(':uid', $UID);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $result = $statement->fetch();
        $statement->closeCursor();
        ?>


        <div class="container-fluid big-container" style="padding: 0; top: 0; left: 0;">
            <div class="col-md-6 col-sm-12 profile-container" style="padding: 0;">
                <div class="col-md-6 col-md-offset-3" style="padding: 0; top: 10px;">
<!--
                    <center><img class="img-responsive visible-lg profile-pic" src="img/team/1.jpg" alt="" style="height:250px;"/></center>
<center><img class="img-responsive visible-md profile-pic" src="img/team/1.jpg" alt="" style="height:250px;"/></center>
<center><img class="img-responsive visible-sm profile-pic" src="img/team/1.jpg" alt="" style="width: 50%;height:250px;"/></center>
<center><img class="img-responsive visible-xs profile-pic" src="img/team/1.jpg" alt="" style="width: 50%; height:180px;"/></center>
                    -->
                    <?php
                    echo $result->displayProfilePic();
                    ?>
                    <form action="addProfilePic.php" method="post" enctype="multipart/form-data" class="profile-form">
                        <center>
                            <input class="buttoncss" id="file" type="file" name="picName" />
                            <label class="buttoncss2" for="file">Choose File</label>
                            <input type='hidden' name="UID" value="<?php echo $UID; ?>"/>
                            <button class="buttoncss" id="profile_button" type="submit" name="submit">Upload</button>
                        </center>
                    </form>
                </div>

                <div class="col-md-12" style="top: 20px;">
                    <center>
                        <h3 id="username"><?php echo $result->getName(); ?> &nbsp;&nbsp;<button type="button" class="edit-btn" ><a href="editProfile.php" class="glyphicon glyphicon-edit edit-btn"></a></button></h3>
                    </center>
                </div>
                
                <div class="col-md-12" style="color: #fff; top: 20px;">
                    <center><p><?php echo $result->getDescription();?></p></center>
                </div>

                <div class="col-md-12" style="color: #fff; top: 20px">
                    <h4>Your Posts</h4>
                    <ul class="your-post">
<!--                                                <li><a href="">post 1</a></li>
                                                <li><a href="">post 2</a></li>
                                                <li><a href="">post 3</a></li>-->
                        <?php
                        $result->displayPostsOfUser();
                        ?>
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
<?php
        }

?>