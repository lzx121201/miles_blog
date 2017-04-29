<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/post.css" rel="stylesheet" type="text/css"/>
        <title>All Posts</title>
    </head>
    <body>
        <?php
        include_once 'session.php';
        include 'navbar.php';
        require_once 'constants.php';
        require_once ("Includes/database.php");
        require_once 'classes/Post.php';
        ?>

        <div class="container-fluid" style="bottom: 0;">
            <div class="col-lg-12">
                <h1 class="page-header">All Posts</h1>
            </div>
            <div class="container">
                <?php
                
                if (isset($_GET['page'])) {
                    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
                }
                else
                    {
                    $page=1;
                    }
                $query = "SELECT * FROM post ORDER BY PostID";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchALL(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Post');
        $statement->closeCursor();
                $posts = array(array());

                $i = 0;$j = 0;$count = 0;
                while ($count < sizeof($result)) {
                    if ($count % (MAX_ROW_AT_ALL*MAX_POST_PER_ROW )== 0 && $count != 0) {
                        $i++;
                        $j = 0;
                    }
                    $posts[$i][$j] = $result[$count];
                    $j++;
                    $count++;
                }
                $pages = sizeof($posts);
                $a = 0;
                $per_page = array_chunk($posts[$page-1],MAX_POST_PER_ROW);
                while($a< sizeof($per_page))
                {
                    echo '<div class="row">';
                    foreach ($per_page[$a] as $p)
                    {
                        echo $p->displayAtAllPost();
                    }
                    echo '</div>';
                    $a++;
                }
                ?>
<!--                <div class="row">
                    <div class="col-md-4 portfolio-item">
                        <a href="#">
                            <img class="img-responsive posts" src="img/index2.JPG" alt="">
                        </a>
                        <span class="fa fa-thumbs-up fa-lg like">&nbsp;&nbsp; 86</span>
                        <h3>
                            <a href="#" style="color: #000">Project Name</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                    <div class="col-md-4 portfolio-item">
                        <a href="#">
                            <img class="img-responsive posts" src="img/index2.JPG" alt="">
                        </a>
                        <span class="fa fa-thumbs-up fa-lg like">&nbsp;&nbsp; 86</span>
                        <h3>
                            <a href="#" style="color: #000">Project Name</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                    <div class="col-md-4 portfolio-item">
                        <a href="#">
                            <img class="img-responsive posts" src="img/index2.JPG" alt="">
                        </a>
                        <span class="fa fa-thumbs-up fa-lg like">&nbsp;&nbsp; 86</span>
                        <h3>
                            <a href="#" style="color: #000">Project Name</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                    </div>
                </div>-->
            </div>

            <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <?php 
                        $num_of_page = sizeof($posts);
                        $previous_page = $page-1;
                        if($previous_page<1)
                        {
                            $previous_page = 1;
                        }
                        $next_page = $page+1;
                        if($next_page>$num_of_page)
                        {
                            $next_page = $num_of_page;
                        }
                            
                        ?>
                        <li>
                            <a href="allPost.php?page=<?php echo $previous_page ;?>">&laquo;</a>
                        </li>
                        <?php
                        $b=0;
                            while($b<$num_of_page)
                            {
                                if($b+1==$page)
                                {
                                    echo '<li class="active" style="color: #ffd11a !important;"><a href="allPost.php?page='.($b+1).'">'.($b+1).'</a></li>';
                                }
                                else
                                {
                                    echo '<li><a href="allPost.php?page='.($b+1).'">'.($b+1).'</a></li>';
                                }
                                $b++;
                                
                            }
                        ?>           
                        <li>
                            <a href="allPost.php?page=<?php echo $next_page ;?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
