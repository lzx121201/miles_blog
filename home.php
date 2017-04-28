<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min_1.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/home.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <?php
    include 'navbar.php';
    require_once ("Includes/database.php");
    require_once 'classes/Post.php';
    require_once ("constants.php");

    ?>
    <body> 
        <div class="container-fluid content" style="padding: 0;">

            <?php
            $query = "SELECT * FROM post";
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
            $statement->closeCursor();
            $count = 0;
            while($count<MAX_POST_AT_HOME && $count < sizeof($result))
            //foreach ($result as $r)
            {
                echo $result[$count]->displayAtHome();
                $count++;
            }
            ?>
            
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>

