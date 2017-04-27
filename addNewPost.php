<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Create New Post</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/addNewPost.css" rel="stylesheet" type="text/css"/>
        <?php
        include 'navbar.php';
        if ($L == TRUE) {
            if (!empty($form_errors1)) {
                print_r($form_errors1);
        }
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->

    </head>

    <body>
        <div class="container">
            <form id="newPost-form" method="post" action="processCreation.php" enctype="multipart/form-data">
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                        <input type="file" class="form-control" name="picName" id="picName" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle" class="form-title">Title</label>
                        <input type="text" class="form-control" id="post-title" name="title" placeholder=" Enter Title" value="">
                    </div>	
                    <div class="form-group">
                        <label for="" class="form-title">Content</label>
                        <textarea rows="20" type="text" class="form-control" id="about-you" name="content" placeholder=" Enter text here..." value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-title">Hashtags</label>
                        <input type="text" class="form-control" id="post-title" name="hashtags" placeholder=" Seperate your hashtags with comma" value="">
                        <input type="hidden" name="userID" value="<?php echo $UID ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-title">Allow Comments</label><br>
                        <input type="radio" name="comments" class="" value="1" checked>Yes<br>
                        <input type="radio" name="comments" class="" value="0" checked>No
                    </div>
                    <div>
                        <center>
                            <button type="submit" id="post_button" class="button submit"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Post</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
<?php
} else {
    header('Location: home.php');
}
?>