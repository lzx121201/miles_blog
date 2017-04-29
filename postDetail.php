<?php
if (isset($_GET['post_id'])) {
    $post_id = filter_input(INPUT_GET, "post_id", FILTER_SANITIZE_NUMBER_INT);
} else {
    header('location:home.php');
}
require_once ("Includes/database.php");
require_once 'classes/Post.php';
require_once ("constants.php");
$query = "SELECT * FROM post WHERE PostID = :pid";
$statement = $db->prepare($query);
$statement->bindValue(':pid', $post_id);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
$result = $statement->fetch();
$statement->closeCursor();
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
        <link href="css/blog.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="js/comment_js.js" type="text/javascript"></script>
        <title><?php echo $result->getTitle(); ?></title>
    </head>
    <body>
        <?php
        include_once 'session.php';
        include 'navbar.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php
                    echo $result->displayAtDetail();
                    ?>
                    <div class="well">
                        <h4>Comments:</h4>
                        <?php if ($L == TRUE && $result->getAllowComment() == 1) { ?>
                            <form method="post"role="form">
                                <div class="form-group">
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                    <input type='hidden' name="UID" id="UID" value="<?php echo $UID; ?>"/>
                                    <input type='hidden' name="PID" id="PID" value="<?php echo $result->getPostID(); ?>"/>

                                </div>
                                <button type="button" id="comment_button" class="btn btn-primary comment-btn">Submit</button>
                            </form>
                            <?php
                        }
                        if($L == FALSE && $result->getAllowComment() == 1)
                        {
                            echo '<center><p>Please <a href="index.php#service">log in</a> or <a href="index.php#portfolio">register</a> to comment.</p></center>';
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="col-lg-8 col-lg-offset-2" id="comment_area">
                        <?php
                        $result->displayPostComments();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
